<?php

namespace App\Http\Controllers\Customer;

use App\Forms\Builders\CustomerForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(CustomerForm $form)
    {
        return ['form' => $form->create()];
    }
}
