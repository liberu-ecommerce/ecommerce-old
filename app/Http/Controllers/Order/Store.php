<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\ValidateOrderRequest;
use App\Models\Order;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateOrderRequest $request, Order $order)
    {
        $order->fill($request->validated())->save();

        return [
            'message' => __('The order was successfully created'),
            'redirect' => 'order.edit',
            'param' => ['order' => $order->id],
        ];
    }
}
