<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\ValidateCustomerRequest;
use App\Models\Customer;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return ['message' => __('The customer was successfully updated')];
    }
}
