<?php

namespace App\Http\Controllers;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Orders;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function totalOrders(){
        $userId = session()->get('id');

        if(!$userId){
            return redirect()->route('signin')->with('error', 'Please login toperform this action!');
        }

        // TO calculate total orders and customers
        $total_orders = Orders::count(); 
        $total_customers = User::count();
        
        //To calculate profit
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
            $shipping = $item->product->shipping_cost ?? 0;
            $expenses = $cost + $tax + $shipping;
            $profit = $item->total_price - $expenses;
            
            $totalProfit += $profit;
        }

        //To calculate sales growth for in mont
        // Get total sales for the current period (this month)
        $currentMonthSales = Orders::whereMonth('created_at', now()->month)->sum('total_amount');
        // Get total sales for the previous period (last month)
        $previousMonthSales = Orders::whereMonth('created_at', now()->subMonth()->month)->sum('total_amount');
        // Calculate the sales growth
        if ($previousMonthSales == 0) {
            $salesGrowth = $currentMonthSales > 0 ? 100 : 0; // Handle division by zero
        } else {
            $salesGrowth = (($currentMonthSales - $previousMonthSales) / $previousMonthSales) * 100;
        }

        // To calculate Products selled
        $selled_products = Orders::sum("quantity");

        // To display todays orders
        $todayOrders = Orders::whereDate('created_at', Carbon::today())->get();

        return view('Admin.Dashboard', compact('total_orders', 'totalProfit', 'total_customers', 'salesGrowth', 'currentMonthSales', 'previousMonthSales', 'selled_products', 'todayOrders'));
    }



}
