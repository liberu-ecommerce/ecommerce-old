<?php

namespace App\Http\Controllers\Cart;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Destroy extends Controller
{
    public function __invoke(Request $request)
    {
        $sessionId = $request->session()->getId();
        $productId = $request->input('product_id');
        $user = auth()->user();

        if ($user) {
            $cartItem = CartItem::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();
        } else {

            $cartItem = CartItem::where('session_id', $sessionId)
                ->where('product_id', $productId)
                ->first();
        }

        if ($cartItem) {
            $cartItem->delete();

            return [
                'message' => __('The product was successfully removed from the cart'),
                'redirect' => 'cart.index',
            ];
        }

        return [
            'message' => __('Product not found in the cart'),
            'redirect' => 'cart.index',
        ];
    }
}
