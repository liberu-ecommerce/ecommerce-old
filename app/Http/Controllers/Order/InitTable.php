<?php

namespace App\Http\Controllers\Order;

use App\Tables\Builders\OrderTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = OrderTable::class;
}
