<?php

namespace App\Http\Controllers\Product\User;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateProductRequest;


class Store extends Controller
{
    public function __invoke(ValidateProductRequest $request)
    {
        $product = $request->validated();

        $product['user_id'] = $request->user()->id;

        $product = Product::create($product);

        return [
            'message' => 'Product created successfully',
            'product' => $product
        ];   
    }
}
