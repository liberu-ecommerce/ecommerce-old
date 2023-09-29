<?php

namespace App\Http\Controllers\Invoice\Admin;

use App\Models\Invoice;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        $invoice->delete();

        return [
            'message' => __('The invoice was successfully deleted'),
            'redirect' => 'invoice.index',
        ];
    }
}
