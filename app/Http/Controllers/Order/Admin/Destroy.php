<?php

namespace App\Http\Controllers\Order\Admin;

use App\Models\Order;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Order $order)
    {
        $order->delete();

        return [
            'message' => __('The order was successfully deleted'),
            'redirect' => 'order.index',
        ];
    }
}
