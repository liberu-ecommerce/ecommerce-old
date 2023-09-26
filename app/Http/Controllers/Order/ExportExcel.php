<?php

namespace App\Http\Controllers\Order;

use App\Tables\Builders\OrderTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = OrderTable::class;
}
