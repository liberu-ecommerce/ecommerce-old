<?php

namespace App\Http\Controllers\Order\Admin;

use App\Models\Order;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Order $order)
    {
        return ['order' => $order];
    }
}
