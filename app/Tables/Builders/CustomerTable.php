<?php

namespace App\Tables\Builders;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class CustomerTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/customer.json';

    public function query(): Builder
    {
        return Customer::selectRaw('
            subms.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
