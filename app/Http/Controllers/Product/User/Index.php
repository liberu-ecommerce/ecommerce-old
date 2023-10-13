<?php

namespace App\Http\Controllers\Product\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class Index extends Controller
{
    public function __invoke()
    {
        $perPage = 10;
        $products = Product::orderBy('created_at', 'desc')
            ->paginate($perPage);

        return [
            'products' => $products
        ];
    }
}
