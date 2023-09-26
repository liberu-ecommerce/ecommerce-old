<?php

namespace App\Http\Controllers\Order\Admin;

use App\Http\Requests\ValidateOrderRequest;
use App\Models\Order;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return ['message' => __('The order was successfully updated')];
    }
}
