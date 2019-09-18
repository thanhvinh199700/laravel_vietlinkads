<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Models\Category;

class CategoriesController extends Controller {

    protected $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


        $category = $this->categoryService->getCategories($request->all());
        return view('category.index', ['categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        $categories = $this->categoryService->getCategories($request->all());
        return view('category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'inputCatname' => 'required|unique:categories,category_name',
        ]);

        $this->categoryService->postCategories($request->all());
        return redirect('category')->with('success_message', 'add category sucess');
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
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {
        $listCategory = $this->categoryService->getCategories();

        $categories = $this->categoryService->getFormEditCategory($category->id);
        return view('category.edit', ['category' => $categories, 'listCategory' => $listCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category) {
        $request->validate([
            'inputCatname' => 'required',
            '',
        ]);

        $this->categoryService->updateCategories($request->all(), $category);
        return redirect('category')->with('success_message', 'update category sucess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        try {
            $this->categoryService->deleteCategory($category);
            return redirect('category')->with('success_message', 'delete category sucess');
        } catch (\Exception $e) {
            return redirect('category')->with('error_message', $e->getMessage());
        }
    }

}
