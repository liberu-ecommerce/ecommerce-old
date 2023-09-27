<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Tables\Builders\InvoiceTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = InvoiceTable::class;
}
