<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RatingService;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller {

    protected $ratingService;

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RatingService $ratingService) {
        $this->ratingService = $ratingService;
    }

    public function store(Request $request, Product $product) {
        if (Auth::check()) {
            $request->validate([
                'rating' => 'required:rating,rating',
            ]);
            $this->ratingService->reviews($request->all(), $product);
            return redirect()->back()->with('success_message', 'cảm ơn về sự đánh giá của bạn');
        } else {
            return redirect('login');
        }
    }

}
