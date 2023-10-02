<?php

namespace App\Forms\Builders;

use App\Models\Invoice;
use LaravelEnso\Forms\Services\Form;

class InvoiceForm
{
    protected const TemplatePath = __DIR__ . '/../Templates/invoice.json';

    protected Form $form;

    public function query()
    {
        return Invoice::selectRaw('
            invoices.id, invoices.customer_id, invoices.order_id, invoices.invoice_date,
            invoices.total_amout, invoices.payment_status 
            ')->join('customers', 'customers.id', '=', 'invoices.customer_id')
            ->join('orders', 'orders.id', '=', 'invoices.order_id');
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Invoice $invoice)
    {
        return $this->form->edit($invoice);
    }

    public function TemplatePath()
    {
        return $this->form = new Form(static::TemplatePath);
    }
}
