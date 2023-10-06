<?php

namespace App\Tables\Builders;

use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class ReviewTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/review.json';

    public function query(): Builder
    {
        return Review::selectRaw('
            reviews.id,reviews.comments,reviews.created_at,
            reviews.product_id, reviews.customer_id,
            ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}