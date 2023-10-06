<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Models\Rating;


class Show extends Controller
{
    public function __invoke(Rating $rating)
    {
       return ['rating' => $rating];
    }
}
