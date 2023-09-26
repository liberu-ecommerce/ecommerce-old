<?php

namespace App\Http\Controllers\Customer\Admin;

use App\Models\Customer;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Customer::class;

    protected $queryAttributes = ['subm'];

    //public function query(Request $request)
    //{
    //    return Customer::query();
    //}
}
