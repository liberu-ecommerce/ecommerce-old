<?php

namespace App\Tables\Builders;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Tables\Contracts\Table;

class CustomerTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/customer.json';

    public function query(): Builder
    {
        return Customer::selectRaw('
            customers.id, customers.first_name, customers.last_name, customers.email,
            customers.phone_number, customers.address, customers.city, customers.state,
	    customers.postal_code
            ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
