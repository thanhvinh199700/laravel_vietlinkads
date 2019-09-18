<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\NewsService;
use App\Models\News;

class NewsController extends Controller {

    /**
     * @var NewsService
     */
    protected $newsService;

    /**
     * Create a new controller instance.
     * @param  NewsService  $newsService
     * @return  void
     */
    public function __construct(NewsService $newsService) {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $news = $this->newsService->getAllNews();
        return view('news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->newsService->postNews($request->all());
        return redirect('news')->with('success_message', 'add news sucess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function edit(News $news) {
        $newss = $this->newsService->getFormEdit($news->id);
        return view('news.edit', ['news' => $newss]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news) {
        $this->newsService->update($request->all(), $news->id);
        return redirect('news')->with('success_message', 'update news sucess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news) {
        $this->newsService->deleteNews($news);
        return redirect('news')->with('success_message', 'delete news sucess');
    }

}
