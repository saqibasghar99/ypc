<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;
use App\Models\Product;
use App\Models\Feefixer;
use App\Models\CartProduct;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
// use Milon\Barcode\Facades\DNS1D;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class OrderController extends Controller
{

    public function storeOrders(Request $request)
{
    $validator = Validator::make($request->all(), [
        'billing_first_name' => 'required|string',
        'billing_last_name' => 'required|string',
        'billing_email' => 'required|string|email',
        'billing_address' => 'required|string',
        'billing_phone' => 'required|string',
        'billing_country' => 'required|string',
        'billing_state' => 'nullable|string',
        'billing_city' => 'required|string',
        'billing_zip' => 'nullable|string',
        'same_as_billing' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $orderNumber = 'ORD' . strtoupper(Str::random(6)) . now()->format('YmdHis');

    $order = new Orders();
    $order->user_id = session()->get('id');
    $order->billing_first_name = $request->input('billing_first_name');
    $order->billing_last_name = $request->input('billing_last_name');
    $order->billing_email = $request->input('billing_email');
    $order->billing_phone = $request->input('billing_phone');
    $order->billing_address = $request->input('billing_address');
    $order->billing_country = $request->input('billing_country');
    $order->billing_state = $request->input('billing_state');
    $order->billing_city = $request->input('billing_city');
    $order->billing_zip = $request->input('billing_zip');
    $order->order_number = $orderNumber;
    $order->ordered_at = Carbon::now();
    $order->payment_status = 'unpaid';
    $order->status = 'pending';
    $order->total_amount = $request->input('total_amount', 0);
    $order->quantity = $request->input('quantity');
    $order->tax_price = $request->input('tax_price');
    $order->shipping_cost = $request->input('shipping_cost');

    if ($request->same_as_billing !== 'checked' || !$request->has('same_as_billing')) {
        $shippingValidator = Validator::make($request->all(), [
            'shipping_first_name' => 'required|string',
            'shipping_last_name' => 'required|string',
            'shipping_email' => 'required|string|email',
            'shipping_address' => 'required|string',
            'shipping_phone' => 'required|string',
            'shipping_country' => 'required|string',
            'shipping_state' => 'nullable|string',
            'shipping_city' => 'required|string',
            'shipping_zip' => 'nullable|string',
        ]);

        if ($shippingValidator->fails()) {
            return redirect()->back()->withErrors($shippingValidator)->withInput();
        }

        $order->shipping_first_name = $request->input('shipping_first_name');
        $order->shipping_last_name = $request->input('shipping_last_name');
        $order->shipping_email = $request->input('shipping_email');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_country = $request->input('shipping_country');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_zip = $request->input('shipping_zip');
    } else {
        $order->shipping_first_name = $order->billing_first_name;
        $order->shipping_last_name = $order->billing_last_name;
        $order->shipping_email = $order->billing_email;
        $order->shipping_phone = $order->billing_phone;
        $order->shipping_address = $order->billing_address;
        $order->shipping_country = $order->billing_country;
        $order->shipping_state = $order->billing_state;
        $order->shipping_city = $order->billing_city;
        $order->shipping_zip = $order->billing_zip;
    }

    $order->save();

    $cartProducts = CartProduct::where('user_id', session()->get('id'))->get();

    foreach ($cartProducts as $product) {

        $userId = session()->get('id');

        OrderItem::create([
            'order_id' => $order->id,
            'user_id' => $userId,
            'product_id' => $product->product_id,
            'quantity' => $product->quantity,
            'size' => $product->size ?? '',
            'total_price' => $product->total_price,
        ]);

         // Find the product and update its stock
         $productModel = Product::find($product->product_id);

         // Decrease the product stock quantity
         if ($productModel && $productModel->stockquantity >= $product->quantity) {
             $productModel->stockquantity -= $product->quantity;
             $productModel->save(); // Save the updated stock
         } else {
             // Handle cases where stock is insufficient, maybe revert the order
             return redirect()->back()->with('error', 'Not enough stock for ' . $productModel->productname);
         }

    }

    // Clear the cart after successful order
    CartProduct::where('user_id', session()->get('id'))->delete();

    return redirect()->route('purchase.history')->with('success', 'Order placed successfully!');
}


    public function SeeCartProducts(Request $request)
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->route('signin')->with('error', 'Please login to view the cart');
        }

        $user = User::find($userId);
        $cartItems = CartProduct::where('user_id', $userId)->get();
        return view('pages.checkout', compact('cartItems'));
    }

    public function Purchase_history()
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->route('signin')->with('error', 'Please login to see your purchase history!');
        }

        $previous_orders = Orders::where('user_id', $userId)->with('items.product')->orderBy('created_at', 'desc')->paginate(3);
        return view('pages.purchaseHistory', compact('previous_orders'));
    }

    public function all_orders(){
        $all_orders = Orders::all();
        return view('Admin.allOrders', compact('all_orders'));
    }

    public function update_order_status(Request $request, $id){
        $request->validate([
            'status' => 'required|string'
        ]);

        $order = Orders::findOrFail($id);
        $order->status = $request->input('status');
        $order->payment_status = $request->input('payment_status');
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function add_feefixer(Request $request){

        $all_fee = Feefixer::all();  

        $userId = session()->get('id');

        if(!$userId){
            return redirect()->route('signin')->with('error', 'Please login to continue!');
        }
        $feefix = new Feefixer();
        $feefix->tax_price = $request->input('tax_price');
        $feefix->shipping_cost = $request->input('shipping_cost');

        $feefix->save();
        return redirect()->back()->with('success', 'Fee added successfully.');
    }

    public function update_feefixer(Request $request, $id)
    {
        $request->validate([
            'tax_price' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
        ]);

        $feefix_update = Feefixer::findOrFail($id);

        $feefix_update->tax_price = $request->input('tax_price');
        $feefix_update->shipping_cost = $request->input('shipping_cost');

        $feefix_update->save();

        $tax_price = $feefix_update->tax_price;
        $shipping_cost = $feefix_update->shipping_cost;

        // Update all products with the new tax_price and shipping_cost
        Product::query()->update([
            'tax_price' => $tax_price,
            'shipping_cost' => $shipping_cost,
        ]);

        return redirect()->back()->with('success', 'Fee updated successfully.');
    }


    public function get_allFee()
    {
        $all_fee = Feefixer::all();  
        $feefix_update = Feefixer::first();

        return view('Admin.FeeFixer', compact('all_fee', 'feefix_update'));
    }


    public function ProductProfitCalc()
    {
        $orderItems = OrderItem::with('product')->get();
        $profitData = [];
        $totalProfit = 0;

        foreach ($orderItems as $item) {
            if (!$item->product) {
                continue; // Skip if product is missing
            }

            $productName = $item->product->productname;
            $productImage = $item->product->image;
            $cost = $item->product->costprice * $item->quantity;
            $tax = $item->product->tax_price ?? 0;
            $discount = $item->product->discount ?? 0;
            $shipping = $item->product->shipping_cost ?? 0;
            $discountprice = $item->product->totalprice * $discount / 100;
            $expenses = $cost + $tax + $shipping + $discountprice;


            $profit = $item->total_price - $expenses;

            $profitData[] = [
                'product' => $productName,
                'productImage' => $productImage,
                'quantity' => $item->quantity,
                'total_price' => $item->total_price,
                'cost' => $cost,
                'tax' => $tax,
                'shipping' => $shipping,
                'discount' => $discount,
                'profit' => $profit,
            ];

            $totalProfit += $profit;
        }

        return view('Admin.Profit', [
            'profits' => $profitData,
            'totalProfit' => $totalProfit
        ]);
    }


    // Below function is not is use
    public function ReturnRequeststore(Request $request)
    {

        $validated = $request->validate([
            'order_item_id' => 'required|exists:order_items,id',
            'reason' => 'required|string|max:500',
        ]);

        $orderItem = OrderItem::findOrFail($validated['order_item_id']);

        if ($orderItem->order->status !== 'delivered') {
            return redirect()->back()->with('error', 'Item is not eligible for return.');
        }

        $return = ReturnRequest::create([
            'order_item_id' => $validated['order_item_id'],
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your return request has been submitted.');
    }
    
    // $order = Orders::with(['items', 'productSpecification'])->findOrFail($orderId);
    public function showShippingLabel($orderId)
    {
        $order = Orders::with(['items.product.specifications'])->findOrFail($orderId);

        $barcode = \DNS1D::getBarcodeHTML($order->order_number, 'C128', 1.0, 40);
        $shippingAddress = $order->shipping_address ?? $order->billing_address;

        return view('Component.ShippingLabel', compact('order', 'barcode', 'shippingAddress'));
    }

    public function showOrderByNumber($order_number)
    {
        $order = Orders::where('order_number', $order_number)->with(['items.product.specifications'])->firstOrFail();
        return view('Pages.PurchaseHistory', compact('order'));
    }

}



