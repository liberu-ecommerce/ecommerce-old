<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Http\Requests\ValidateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());

        return ['message' => __('The invoice was successfully updated')];
    }
}
