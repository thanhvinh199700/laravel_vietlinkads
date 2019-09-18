<?php

namespace App\Services;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class RatingService {

    public function reviews($data, $product) {
        if (Auth::check()) {
            Rating::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $product->id,
                'rating' => $data['rating']
            ]);
        }
    }

    public function getRatingOfProduct($product_id) {
        $product = Product::find($product_id);
        $poinRating5 = count(Rating::where('product_id', $product->id)
                        ->where('rating', '=', 5)
                        ->get());
        $poinRating4 = count(Rating::where('product_id', $product->id)
                        ->where('rating', '=', 4)
                        ->get());
        $poinRating3 = count(Rating::where('product_id', $product->id)
                        ->where('rating', '=', 3)
                        ->get());
        $poinRating2 = count(Rating::where('product_id', $product->id)
                        ->where('rating', '=', 2)
                        ->get());
        $poinRating1 = count(Rating::where('product_id', $product->id)
                        ->where('rating', '=', 1)
                        ->get());
        $poinRating = count(Rating::where('product_id', $product->id)
                        ->get());
        //dd($poinRating);
        if ($poinRating === 0) {
            $totalRating = 0;
        } else {
            $totalRating = ((($poinRating5 * 5) + ($poinRating4 * 4) + ($poinRating3 * 3) + ($poinRating2 * 2) + ($poinRating1 * 1)) / $poinRating);
        }
        return [$poinRating5, $poinRating4, $poinRating3, $poinRating2, $poinRating1, $totalRating,$poinRating];
    }

}
