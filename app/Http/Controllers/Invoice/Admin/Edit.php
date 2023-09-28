<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Forms\Builders\InvoiceForm;
use App\Models\Invoice;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Invoice $invoice, InvoiceForm $form)
    {
        return ['form' => $form->edit($invoice)];
    }
}
