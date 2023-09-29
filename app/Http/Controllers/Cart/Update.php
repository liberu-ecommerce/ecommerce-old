<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCartRequest;


class Update extends Controller
{
    public function __invoke(ValidateCartRequest  $request)
    {
    
        $cart = $request->session()->get('cart');

        if ($cart) {
            foreach ($cart as $key) {
                if ($request->input('quantity.' . $key) > 0) {
                    $cart[$key]['quantity'] = $request->input('quantity.' . $key);
                } else {
                    unset($cart[$key]);
                }
            }
        }

        $request->session()->put('cart', $cart);

        return [
            'message' => __('The cart was successfully updated'),
            'redirect' => 'cart.index',
        ];
    }
}
