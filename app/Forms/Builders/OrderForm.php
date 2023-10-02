<?php

namespace App\Forms\Builders;

use App\Models\Order;
use LaravelEnso\Forms\Services\Form;

class OrderForm
{
    protected const TemplatePath = __DIR__ . '/../Templates/order.json';

    protected Form $form;

    public function query()
    {
        return Order::selectRaw('
            orders.id, orders.customer_id, orders.order_date, orders.total_amount, orders.payment_status
            ')->join('customers', 'customers.id', '=', 'orders.customer_id');
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
