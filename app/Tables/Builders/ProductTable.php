<?php

namespace App\Tables\Builders;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class ProductTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/product.json';

    public function query(): Builder
    {
        return Product::selectRaw('
            subms.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
