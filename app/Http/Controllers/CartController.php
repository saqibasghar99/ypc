<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        try {
            if (session()->missing('id')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please log in to add products to your cart',
                    'redirect' => route('signin')
                ], 401);
            }
    
            $user = User::find(session()->get("id"));
            $productId = $request->input('id');
            $quantity = $request->input('quantity', 1);
            $product = Product::findOrFail($productId);
    
            // Validate quantity
            if ($quantity < 1 || $quantity > 5) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Quantity must be between 1 and 5'
                ], 400);
            }
    
            $existingCartItem = CartProduct::where('user_id', $user->id)
                                        ->where('product_id', $productId)
                                        ->first();
    
            $totalPrice = $product->totalprice * $quantity;
    
            if ($existingCartItem) {
                $newQuantity = $existingCartItem->quantity + $quantity;
                
                if ($newQuantity > 5) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Maximum quantity for this product is 5. You already have ' . $existingCartItem->quantity . ' in your cart.'
                    ], 400);
                }
                
                $existingCartItem->update([
                    'quantity' => $newQuantity,
                    'total_price' => $product->totalprice * $newQuantity
                ]);
            } else {
                CartProduct::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'size' => $request->input('size', 'medium(M)'),
                    'unit_price' => $product->totalprice,
                    'total_price' => $totalPrice,
                    'color' => $request->input('color', ''),
                    'currency' => $request->input('currency', '$')
                ]);
            }

            // Get updated cart data
            $cartCount = CartProduct::where('user_id', $user->id)->sum('quantity');
            $cartTotal = CartProduct::where('user_id', $user->id)
                                  ->sum('total_price');

            session(['cart_quantity' => $cartCount]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!',
                'cart' => [
                    'count' => $cartCount,
                    'total' => $cartTotal
                ]
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

public function buyNow(Request $request)
{
    try {
        if (session()->missing('id')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please log in to proceed with your purchase',
                'redirect' => route('signin')
            ], 401);
        }

        $user = User::find(session()->get("id"));
        $productId = $request->input('id');
        $quantity = $request->input('quantity', 1);

        // Validate quantity
        if ($quantity < 1 || $quantity > 5) {
            return response()->json([
                'status' => 'error',
                'message' => 'Quantity must be between 1 and 5'
            ], 400);
        }

        // Validate product exists
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        // Clear current cart (optional - depends on your business logic)
        CartProduct::where('user_id', $user->id)->delete();

        // Add the product to cart
        CartProduct::updateOrCreate(
            [
                'user_id' => $user->id,
                'product_id' => $productId
            ],
            [
                'quantity' => $quantity,
                'size' => $request->input('size', ''),
                'unit_price' => $product->totalprice,
                'total_price' => $product->totalprice * $request->quantity,
                'color' => $request->input('color', ''),
            ]
        );

        return response()->json([
            'status' => 'success',
            'redirect' => route('cart-checkout.view')
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred: ' . $e->getMessage()
        ], 500);
    }
}

    public function ViewCart()
    {
        $userId = session()->get('id');
        
        if (!$userId && !Auth::check()) {
            return redirect()->route('signin')->with('error', 'Please login to view the cart');
        }

        $user = User::find($userId ?? Auth::id()); // Fallback to logged-in user's ID if session ID is missing
        $cartItems = CartProduct::where('user_id', $user->id)->get();

        // Calculate total cart quantity
        $totalQuantity = $cartItems->sum('quantity');
        Session::put('cart_quantity', $totalQuantity);

        return view('pages.shopingcart', compact('cartItems'));
    }

    public function updateQuantity(Request $request, $itemId)
    {
        $cartItem = CartProduct::find($itemId);

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }

        // Update the quantity
        $cartItem->quantity = $request->quantity;
        $cartItem->total_price = $cartItem->product->totalprice * $request->quantity;
        $cartItem->save();

        $updatedCartItems = CartProduct::where('user_id', $cartItem->user_id)->get(); // Fetch updated cart items for the user
        $totalPrice = $updatedCartItems->sum(function ($item) {
            return $item->product->totalprice * $item->quantity;
        });

        return response()->json([
            'success' => true,
            'updatedCartItems' => $updatedCartItems,
            'totalPrice' => $totalPrice
        ]);
    }


    public function removeCartItem($itemId)
    {
        if (session()->has('id')) {
            $user = User::find(session()->get('id'));
            $cartItem = CartProduct::where('user_id', $user->id)
                                ->where('id', $itemId)
                                ->first();
            
            if ($cartItem) {
                $cartItem->delete(); 
            }

            $updatedCartItems = CartProduct::where('user_id', $user->id)->get();
            $totalPrice = $updatedCartItems->sum(function ($item) {
                return $item->product->totalprice * $item->quantity;
            });

            return redirect()->route('cart.view')->with('success','Item removed successfully!');
        }

        return response()->json(['success' => false, 'message' => 'User not logged in']);
    }


}
