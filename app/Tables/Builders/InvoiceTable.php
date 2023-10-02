<?php

namespace App\Tables\Builders;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class InvoiceTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/invoice.json';

    public function query()
    {
        return Invoice::selectRaw('
            invoices.id, invoices.customer_id, invoices.order_id, invoices.invoice_date,
            invoices.total_amout, invoices.payment_status
            ')->join('customers', 'customers.id', '=', 'invoices.customer_id')
            ->join('orders', 'orders.id', '=', 'invoices.order_id');
    }
    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
