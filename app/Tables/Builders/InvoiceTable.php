<?php

namespace App\Tables\Builders;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class InvoiceTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/invoice.json';

    public function query(): Builder
    {
        return Invoice::selectRaw('
            subms.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
