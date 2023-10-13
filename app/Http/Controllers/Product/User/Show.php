<?php

namespace App\Http\Controllers\Product\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Show extends Controller
{
    public function __invoke(Request $request)
    {  
        $product = Product::find($request->id);

        return [
            'product' => $product
        ]; 
    }
}
