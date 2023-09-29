<?php

namespace App\Http\Controllers\Cart;

use App\Models\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateCartRequest;
use Illuminate\Support\Facades\Session;


class Update extends Controller
{
    public function __invoke(ValidateCartRequest  $request)
    {
        $user = Auth::user();
        $sessionId = Session::getId();

        if ($user) {
            $cart = CartItem::where('user_id', $user->id)->get();

        } else {
            $cart = CartItem::where('session_id', $sessionId)->get();
        }

        if ($cart->isNotEmpty()) {
            foreach ($cart as $item) {
                $key = $item->id;
                $quantity = $request->input('quantity.' . $key);

                if ($quantity > 0) {

                    $item->update(['quantity' => $quantity]);
                } else {
                    $item->delete();
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
