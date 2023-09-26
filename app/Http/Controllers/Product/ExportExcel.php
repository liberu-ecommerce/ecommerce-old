<?php

namespace App\Http\Controllers\Product;

use App\Tables\Builders\ProductTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = ProductTable::class;
}
