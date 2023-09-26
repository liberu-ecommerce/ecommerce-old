<?php

namespace App\Http\Controllers\Order;

use App\Forms\Builders\OrderForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(OrderForm $form)
    {
        return ['form' => $form->create()];
    }
}
