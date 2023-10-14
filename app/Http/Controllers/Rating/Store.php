<?php

namespace App\Http\Controllers\Rating;

use App\Models\Rating;
use App\Http\Controllers\Controller;
use LaravelLiberu\Files\Services\Validate;
use App\Http\Requests\ValidateRatingRequest;

class Store extends Controller
{
    public function __invoke(ValidateRatingRequest $request)
    {

        $customer = auth()->user();

        if (!$customer) {

            return [
                'message' => __('You are not logged in'),
                'redirect' => 'login',
            ];
        }

        $user_id = $customer->user->id;
        $validatedData = $request->validated();

        $existingRating = Rating::where('customer_id', $user_id)
            ->where('product_id', $validatedData['product_id'])
            ->first();

        if ($existingRating) {
            $existingRating->update([
                'rating' => $validatedData['rating'],
            ]);
        } else {
            $rating = new Rating([
                'customer_id' => $user_id,
                'product_id' => $validatedData['product_id'],
                'rating' => $validatedData['rating'],
            ]);
            $rating->save();
        }

        return [
            'message' => __('The rating was successfully created'),
            'redirect' => 'rating.edit',
            'param' => ['rating' => $rating->id],
        ];
    }
}
