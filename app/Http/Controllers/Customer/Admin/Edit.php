<?php

namespace App\Http\Controllers\Customer\Admin;

use App\Forms\Builders\CustomerForm;
use App\Models\Customer;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Customer $customer, CustomerForm $form)
    {
        return ['form' => $form->edit($customer)];
    }
}
