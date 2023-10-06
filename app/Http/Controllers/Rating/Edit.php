<?php

namespace App\Http\Controllers\Rating;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Edit extends Controller
{
    public function __invoke(Request $request)
    {
        $rating = Rating::find($request->get('id'));

        return [
            'form' => $rating,
        ];
    }
}
