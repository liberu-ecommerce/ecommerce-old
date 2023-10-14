<?php

namespace App\Http\Controllers\Product\Admin;

use App\Tables\Builders\ProductTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = ProductTable::class;
}
