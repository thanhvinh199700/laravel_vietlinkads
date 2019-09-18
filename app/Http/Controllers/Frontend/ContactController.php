<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\ContactService;
use App\Services\MenuService;

class ContactController extends Controller {

    protected $menuService;
    protected $categoryService;
    protected $contactService;

    public function __construct(CategoryService $categoryService, MenuService $menuService, ContactService $contactService) {
        $this->categoryService = $categoryService;
        $this->menuService = $menuService;
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $menu = $this->menuService->getMenus($request->all());
        $category = $this->categoryService->getCategoriess($request->all());
        return View('home.contact', ['categories' => $category, 'menus' => $menu]);
    }

    public function create(Request $request) {
        $this->contactService->postContact($request->all());
        return redirect('contact')->with('success_message', 'add contact sucess');
    }

}
