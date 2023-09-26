<?php

namespace App\Http\Controllers\Product\Admin;

use App\Http\Requests\ValidateProductRequest;
use App\Models\Product;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateProductRequest $request, Product $product)
    {
        $product->fill($request->validated())->save();

        return [
            'message' => __('The product was successfully created'),
            'redirect' => 'product.edit',
            'param' => ['product' => $product->id],
        ];
    }
}
