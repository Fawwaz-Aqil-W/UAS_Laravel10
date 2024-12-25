<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get();
        return response()->json($cartItems);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

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

        return response()->json(['message' => 'Item added to cart', 'cartItem' => $cartItem]);
    }

    public function remove($id)
    {
        $cartItem = CartItem::where('id', $id)->where('user_id', auth()->id())->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Item removed from cart']);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }

    public function checkout()
    {
        $total = auth()->user()->cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        auth()->user()->cartItems()->delete();

        return response()->json(['message' => 'Checkout successful', 'total' => $total]);
    }
}