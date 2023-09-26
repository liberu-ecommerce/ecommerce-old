<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Product $product)
    {
        $product->delete();

        return [
            'message' => __('The product was successfully deleted'),
            'redirect' => 'product.index',
        ];
    }
}
