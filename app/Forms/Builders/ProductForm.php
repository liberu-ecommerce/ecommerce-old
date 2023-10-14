<?php

namespace App\Forms\Builders;

use App\Models\Product;
use LaravelLiberu\Forms\Services\Form;

class ProductForm
{
    protected const TemplatePath = __DIR__.'/../Templates/product.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Product $product)
    {
        return $this->form->edit($product);
    }
}
