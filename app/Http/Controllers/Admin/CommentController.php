<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use App\Models\Comments;

class CommentController extends Controller {

    protected $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $comment = $this->commentService->listComment();
        return view('comment.index', ['comments' => $comment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comment) {
        $this->commentService->deleteComment($comment);
        return redirect('comment')->with('success_message', 'delete comment sucess');
    }

}
