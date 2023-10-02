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
            products.id, products.name, products.description, products.price,
            products.category_id, products.stock_quantity, products.image_url
            ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
