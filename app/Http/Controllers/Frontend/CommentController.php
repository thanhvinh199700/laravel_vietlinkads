<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Models\Product;

class CommentController extends Controller {

    
    protected $commentService;
    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function createComment(Request $request, Product $product) {
        if ($this->commentService->createComments($request->all(), $product) == 1) {
            return '<script type="text/javascript">alert("bình luận thành công");</script>' . redirect()->back();
        } else {
            return '<script type="text/javascript">alert("bạn phải đăng nhập");</script>' . redirect('login');
        }
    }

}
