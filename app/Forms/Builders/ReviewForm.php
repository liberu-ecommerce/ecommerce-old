<?php
namespace App\Forms\Builders;

use App\Models\Review;

use LaravelEnso\Forms\Services\Form;

class ReviewForm
{
    protected const TemplatePath = __DIR__.'/../Templates/review.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Review $review)
    {
        return $this->form->edit($review);
    }
}
?>