<?php

namespace App\Http\Controllers\Product;

use App\Tables\Builders\ProductTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = ProductTable::class;
}
