<?php

namespace App\Services;

use App\Models\Category;

class CategoryService {

    public function getCategories() {
        $cat = Category::with('parentOne')->orderBy('parent')->get();
        return $cat;
    }

    public function getCategoriess() {
        $cat = Category::list()->get();
        return $cat;
    }

    public function postCategories(array $data) {
        $dt = date('Y-m-d H:i:s');
        Category::create([
            "category_name" => $data['inputCatname'],
            "parent" => $data['selectParent'],
            "status" => $data['radioStatus'],
            "trash" => $data['radioTrash'],
            "created_at" => $dt
        ]);
    }

    public function getFormEditCategory($category_id) {
        $categories = Category::find($category_id);
        return $categories;
    }

    public function updateCategories(array $data, Category $category) {
        $dt = date('Y-m-d H:i:s');

        // Insert vào CSDL 
        $category->update([
            "category_name" => $data['inputCatname'],
            "parent" => $data['selectParent'],
            "status" => $data['radioStatus'],
            "trash" => $data['radioTrash'],
            "updated_at" => $dt
        ]);
        //dd($categoryUpdate);
    }

    public function deleteCategory($category) {
        //dd($category->childrenProducts);
        if (($category->children()->exists()) || ($category->childrenProducts()->exists())) {
            throw new \Exception('There may be subcategories or product that should not be deleted');
        }
        $category->delete();
    }

}
