<?php

namespace App\Http\Controllers\Cart;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCartRequest;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Store extends Controller
{
    public function __invoke(ValidateCartRequest $request, Product $product)
    {
        $validated = $request->validated();
        $product = Product::find($validated['id']);

        if (!$product) {
            return [
                'message' => __('The product was not found'),
                'redirect' => 'cart.index',
            ];
        }

        if (Auth::check()) {
           
            $user = Auth::user();
            $cart_item = CartItem::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first();

            if ($cart_item) {
                $cart_item->quantity += 1;
                $cart_item->save();
            } else {
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => 1,
                ]);

                $cart_item = CartItem::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->first(); 
                
                return [
                    'message' => __('The product was successfully added to the cart'),
                    'redirect' => 'cart.index',
                    'param' => ['cart' => $cart_item->id],
                ];
            }
        } else {
           

            $sessionId = Session::getId();
            $cartItem = CartItem::where('session_id', $sessionId)
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                CartItem::create([
                    'session_id' => $sessionId,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => 1,
                ]);

                $cart_item = CartItem::where('session_id', $sessionId)
                    ->where('product_id', $product->id)
                    ->first(); 
                
                return [
                    'message' => __('The product was successfully added to the cart'),
                    'redirect' => 'cart.index',
                    'param' => ['cart' => $cart_item->id],
                ];
            }
        }
    }
}
