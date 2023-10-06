<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;


class Show extends Controller
{
    public function __invoke(Review $review)
    {
        return ['review' => $review]; 
    }
}
