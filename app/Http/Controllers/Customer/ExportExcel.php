<?php

namespace App\Http\Controllers\Customer;

use App\Tables\Builders\CustomerTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = CustomerTable::class;
}
