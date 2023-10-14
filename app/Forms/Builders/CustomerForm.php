<?php

namespace App\Forms\Builders;

use App\Models\Customer;
use LaravelLiberu\Forms\Services\Form;

class CustomerForm
{
    protected const TemplatePath = __DIR__.'/../Templates/customer.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Customer $customer)
    {
        return $this->form->edit($customer);
    }
}
