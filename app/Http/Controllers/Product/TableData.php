<?php

namespace App\Http\Controllers\Product;

use App\Tables\Builders\ProductTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = ProductTable::class;
}
