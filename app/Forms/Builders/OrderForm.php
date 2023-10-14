<?php

namespace App\Forms\Builders;

use App\Models\Order;
use LaravelLiberu\Forms\Services\Form;

class OrderForm
{
    protected const TemplatePath = __DIR__ . '/../Templates/order.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Order $order)
    {
        return $this->form->edit($order);
    }

    public function templatePath()
    {
        return $this->form = new Form(static::TemplatePath);
    }
}
