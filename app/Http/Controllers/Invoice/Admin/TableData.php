<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Tables\Builders\InvoiceTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = InvoiceTable::class;
}
