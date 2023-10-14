<?php

namespace App\Http\Controllers\Order\Admin;

use App\Tables\Builders\OrderTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = OrderTable::class;
}
