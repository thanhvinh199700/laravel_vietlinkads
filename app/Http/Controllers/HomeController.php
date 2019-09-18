<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\MenuService;

class HomeController extends Controller
{
protected $menuService;

    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * @var ProductService
     */
    protected $commentService;

    /**
     * Create a new controller instance.
     * @param  MenuService  $menuService
     * @param  CategoryService  $categoryService
     * @param  ProductService  $productService
     * @return  void
     */
    public function __construct(MenuService $menuService,
            CategoryService $categoryService,
            ProductService $productService
            ) {
        $this->menuService = $menuService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
       
    }

    public function index() {

        $menu = $this->menuService->getMenus();
        $categories = $this->categoryService->getCategoriess();
        $result = $this->productService->getNewProduct();
        $sale = $this->productService->getSaleProduct();
        return view('home', ['result' => $result, 'saleproduct' => $sale, 'categories' => $categories, 'menus' => $menu]);
    }
}
