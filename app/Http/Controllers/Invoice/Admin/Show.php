<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Models\Invoice;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        return ['invoice' => $invoice];
    }
}
