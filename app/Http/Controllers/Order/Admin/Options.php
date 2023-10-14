<?php

namespace App\Http\Controllers\Order\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Order::class;

    protected array $queryAttributes = ['payment_status'];

    /*public function query(Request $request)
    {
        return Order::query();
    }*/
}
