<?php

namespace App\Http\Controllers\Order;

use App\Forms\Builders\OrderForm;
use App\Models\Order;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Order $order, OrderForm $form)
    {
        return ['form' => $form->edit($order)];
    }
}
