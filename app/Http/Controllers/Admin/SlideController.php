<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\SlideService;
use App\Models\Slide;
use App\Http\Controllers\Controller;
use App\Jobs\SendMailToUser;
use App\Services\UserService;

class SlideController extends Controller {

    /**
     * @var NewsService
     */
    protected $slideService;
    protected $userService;

    /**
     * Create a new controller instance.
     * @param  SlideService  $slideService
     * @return  void
     */
    public function __construct(SlideService $slideService, UserService $userSerview) {
        $this->slideService = $slideService;
        $this->userService = $userSerview;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $slides = $this->slideService->getAllSlides();
        return view('slide.index', ['slide' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->slideService->postSlide($request->all());
        return redirect('slide')->with('success_message', 'add news sucess');
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
    public function edit(Slide $slide) {
        $slides = $this->slideService->getFormEdit($slide->id);
        return view('slide.edit', ['slide' => $slides]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide) {
        $this->slideService->update($request->all(), $slide);
        return redirect('slide')->with('success_message', 'update news sucess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide) {
        $this->slideService->deleteNews($slide);
        return redirect('slide')->with('success_message', 'delete news sucess');
    }

}
