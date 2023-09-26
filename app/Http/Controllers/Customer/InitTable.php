<?php

namespace App\Http\Controllers\Customer;

use App\Tables\Builders\CustomerTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = CustomerTable::class;
}
