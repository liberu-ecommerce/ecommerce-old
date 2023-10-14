<?php

namespace App\Forms\Builders;

use App\Models\Invoice;
use LaravelLiberu\Forms\Services\Form;

class InvoiceForm
{
    protected const TemplatePath = __DIR__ . '/../Templates/invoice.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
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
