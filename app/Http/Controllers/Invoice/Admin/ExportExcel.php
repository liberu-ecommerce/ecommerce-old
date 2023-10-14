<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Tables\Builders\InvoiceTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = InvoiceTable::class;
}
