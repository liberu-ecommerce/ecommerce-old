<?php

namespace App\Http\Controllers\Customer\Admin;

use App\Tables\Builders\CustomerTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = CustomerTable::class;
}
