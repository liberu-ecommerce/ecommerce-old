<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Customer $customer)
    {
        $customer->delete();

        return [
            'message' => __('The customer was successfully deleted'),
            'redirect' => 'customer.index',
        ];
    }
}
