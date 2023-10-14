<?php

namespace App\Http\Controllers\Product\Admin;

use App\Models\Product;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Product::class;

    //public function query(Request $request)
    //{
    //    return Product::query();
    //}
}
