<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Product::class;

    protected $queryAttributes = ['subm'];

    //public function query(Request $request)
    //{
    //    return Product::query();
    //}
}
