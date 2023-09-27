<?php

namespace App\Http\Controllers\Product\Admin;

use App\Forms\Builders\ProductForm;
use App\Models\Product;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Product $product, ProductForm $form)
    {
        return ['form' => $form->edit($product)];
    }
}
