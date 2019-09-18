<?php

namespace App\Services;

use App\Models\News;

class NewsService {

    public function getAllNews() {
        return News::all();
    }

    public function postNews($data) {
        News::create([
            'tittle' => $data['tittle'],
            'short_description' => $data['short_description'],
            'avatar' => $data['avatar'],
            'content' => $data['content'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }

    public function getFormEdit($new_id) {
        return News::find($new_id);
    }

    public function update($data, $news_id) {
        $news_id->update([
            'tittle' => $data['tittle'],
            'short_description' => $data['short_description'],
            'avatar' => $data['avatar'],
            'content' => $data['content'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }

    public function deleteNews($news) {
        $news->delete();
    }

}
