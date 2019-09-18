<?php

namespace App\Services;

use App\Models\Slide;

class SlideService {

    public function getAllSlides() {
        return Slide::all();
    }

    public function get5Slides() {
        return Slide::orderby('created_at', 'DESC')->take(5)->get();
    }

    public function postSlide($data) {
        Slide::create([
            'tittle' => $data['tittle'],
            'short_description' => $data['short_description'],
            'slide_image' => $data['slide_image'],
            'content' => $data['content'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }

    public function getFormEdit($slide_id) {
        return slide::find($slide_id);
    }

    public function update($data, $slide) {
        $slide->update([
            'tittle' => $data['tittle'],
            'short_description' => $data['short_description'],
            'slide_image' => $data['slide_image'],
            'content' => $data['content'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }

    public function deleteSlide($slide) {
        $slide->delete();
    }

}
