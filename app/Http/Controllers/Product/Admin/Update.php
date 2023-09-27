<?php

namespace App\Http\Controllers\Product\Admin;

use App\Http\Requests\ValidateProductRequest;
use App\Models\Product;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return ['message' => __('The product was successfully updated')];
    }
}
