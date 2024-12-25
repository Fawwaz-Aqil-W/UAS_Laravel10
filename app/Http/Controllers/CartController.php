<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $cartItem = CartItem::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
            ],
            [
                'quantity' => 1
            ]
        );

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        return redirect()->back()->with('success', 'Item added to cart');
    }

    public function remove($id)
    {
        CartItem::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function checkout()
    {
        $total = auth()->user()->cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        auth()->user()->cartItems()->delete();

        return view('cart.checkout', compact('total'));
    }
}