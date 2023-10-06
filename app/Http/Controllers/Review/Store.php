<?php

namespace App\Http\Controllers\Review;

use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateReviewRequest;


class Store extends Controller
{
    public function __invoke(ValidateReviewRequest $request)
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

        $existingReview = Review::where('customer_id', $user_id)
            ->where('product_id', $validatedData['product_id'])
            ->first();

        if ($existingReview) {
            $existingReview->update([
                'comments' => $validatedData['comments'],
            ]);
        } else {
            $review = new Review([
                'customer_id' => $user_id,
                'product_id' => $validatedData['product_id'],
                'comments' => $validatedData['comments'],
            ]);
            $review->save();
        }

        return [
            'message' => __('The review was successfully created'),
            'redirect' => 'review.edit',
            'param' => ['review' => $review->id],
        ];
        
    }
}
