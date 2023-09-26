<?php

namespace App\Http\Controllers\Order;

use App\Tables\Builders\OrderTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = OrderTable::class;
}
