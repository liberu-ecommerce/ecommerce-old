<?php

namespace App\Tables\Builders;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class OrderTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/order.json';

    public function query(): Builder
    {
        return Order::selectRaw('
            subms.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
