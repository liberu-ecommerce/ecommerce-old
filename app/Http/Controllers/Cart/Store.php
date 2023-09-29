<?php

namespace App\Http\Controllers\Cart;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCartRequest;
use App\Models\CartItem;

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

        $cart_item = CartItem::find('product_id', $product->id);

        if ($cart_item) {
            $cart_item->quantity += 1;
            $cart_item->save();

        } else {
            CartItem::add([
                'product_id' => $cart_item->product_id,
                'price' => $cart_item->price,
                'quantity' =>  1,
            ]);

            return [
                'message' => __('The product was successfully added to the cart'),
                'redirect' => 'cart.index',
                'param' => ['cart' => $cart_item->id],
            ];
        }

        session(['cart_id' => $cart_item->id]);
    }
}
