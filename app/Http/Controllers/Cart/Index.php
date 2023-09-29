<?php

namespace App\Http\Controllers\Cart;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Index extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $sessionId = Session::getId();

        if ($user) {
            $cart = CartItem::where('user_id', $user->id)->get();
        } else {
            $cart = CartItem::where('session_id', $sessionId)->get();
        }

        return [
            'cart' => $cart,
        ];
    }
}
