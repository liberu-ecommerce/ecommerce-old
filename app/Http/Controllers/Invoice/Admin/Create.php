<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Forms\Builders\InvoiceForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(InvoiceForm $form)
    {
        return ['form' => $form->create()];
    }
}
