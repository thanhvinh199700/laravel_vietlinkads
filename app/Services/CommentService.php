<?php

namespace App\Services;

use App\Models\Comments;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class CommentService {

    public function createComments(array $data, $product) {
        //dd($product->id);
        if (Auth::check()) {
            $dt = date('Y-m-d H:i:s');
            Comments::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'avatar' => Auth::user()->avatar,
                'comment_date' => $dt,
                'comment_content' => $data['content'],
                'status' => 1,
                'trash' => 0,
            ]);
            return 1;
        } else {
            return 0;
        }
    }

    public function getCommentsOfProduct($product_id) {
        $product = Product::find($product_id);
        $comment = Comments::with('user')->where('product_id', $product->id)->get();
        //dd($comment);
        return $comment;
    }

    public function listComment() {
        return Comments::with('product')->with('user')->orderBy('product_id')->get();
    }
    public function listCommentDetail($product_id){
        return Comments::with('product')->with('user')->where('product_id',$product_id)->get();
    }
    public function deleteComment($comment){
        $comment->delete();
    }

}
