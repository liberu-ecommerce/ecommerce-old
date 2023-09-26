<?php

namespace App\Http\Controllers\Product;

use App\Forms\Builders\ProductForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(ProductForm $form)
    {
        return ['form' => $form->create()];
    }
}
