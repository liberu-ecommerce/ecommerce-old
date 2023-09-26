<?php

namespace App\Http\Controllers\Order;

use App\Models\Order;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Order::class;

    protected $queryAttributes = ['subm'];

    //public function query(Request $request)
    //{
    //    return Order::query();
    //}
}
