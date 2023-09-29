<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Destroy extends Controller
{
    public function __invoke(Request $request)
    {
        $request->session()->forget('cart');

        return [
            'message' => __('The cart was successfully deleted'),
            'redirect' => 'cart.index',
        ];
    }
}
