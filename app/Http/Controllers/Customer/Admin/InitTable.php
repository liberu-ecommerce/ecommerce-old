<?php

namespace App\Http\Controllers\Customer\Admin;

use App\Tables\Builders\CustomerTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = CustomerTable::class;
}
