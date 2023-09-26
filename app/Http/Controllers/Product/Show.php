<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Product $product)
    {
        return ['product' => $product];
    }
}
