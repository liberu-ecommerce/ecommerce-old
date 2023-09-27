<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Http\Requests\ValidateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->fill($request->validated())->save();

        return [
            'message' => __('The invoice was successfully created'),
            'redirect' => 'invoice.edit',
            'param' => ['invoice' => $invoice->id],
        ];
    }
}
