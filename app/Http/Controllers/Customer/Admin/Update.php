<?php

namespace App\Http\Controllers\Customer\Admin;

use App\Http\Requests\ValidateCustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateCustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return ['message' => __('The customer was successfully updated')];
    }
}
