<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Models\Invoice;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Invoice::class;

    protected $queryAttributes = ['subm'];

    //public function query(Request $request)
    //{
    //    return Invoice::query();
    //}
}
