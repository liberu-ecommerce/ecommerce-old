<?php

namespace App\Http\Controllers\Product\Admin;

use App\Tables\Builders\ProductTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = ProductTable::class;
}
