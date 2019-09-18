<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\MenuService;
use App\Services\CommentService;
use App\Services\RatingService;
use App\Services\OrderService;
use App\Services\SlideService;
use Illuminate\Support\Facades\Auth;
use App\Services\MessageService;

class ProductController extends Controller {

    protected $menuService;
    protected $categoryService;
    protected $productService;
    protected $commentService;
    protected $orderService;
    protected $slideService;
    protected $ratingService;
    protected $messageService;

    public function __construct(MenuService $menuService,
            CategoryService $categoryService,
            ProductService $productService,
            CommentService $commentService,
            OrderService $orderService,
            SlideService $slideService,
            RatingService $ratingService,
            MessageService $messageService) {
        $this->menuService = $menuService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->commentService = $commentService;
        $this->orderService = $orderService;
        $this->slideService = $slideService;
        $this->ratingService = $ratingService;
        $this->messageService = $messageService;
    }

    public function index() {

        $menu = $this->menuService->getMenus();
        $categories = $this->categoryService->getCategoriess();
        $result = $this->productService->getNewProduct();
        $sale = $this->productService->getSaleProduct();
        $sells = $this->productService->getSell();
        $slides = $this->slideService->get5Slides();
        if (Auth::check()) {
            $message = $this->messageService->userMessages(Auth::user());
            $adminSendMessages = $this->messageService->adminMessages(Auth::user());
            
            //dd($adminSendMessages);
            return view('home', ['adminSendMessage' => $adminSendMessages, 'message' => $message, 'slide' => $slides, 'sell' => $sells, 'result' => $result, 'saleproduct' => $sale, 'categories' => $categories, 'menus' => $menu]);
        }
        return view('home', ['slide' => $slides, 'sell' => $sells, 'result' => $result, 'saleproduct' => $sale, 'categories' => $categories, 'menus' => $menu]);
    }

    public function getProductCat(Category $category) {

        $menu = $this->menuService->getMenus();
        $categories = $this->categoryService->getCategoriess();
        $productCat = $this->productService->getProductCate($category->id);
        $slides = $this->slideService->get5Slides();
        if (count($productCat) > 0) {
            return view('home.product_cat', ['slide' => $slides, 'productCat' => $productCat, 'categories' => $categories, 'menus' => $menu]);
        }
        return view('home.error_empty', ['categories' => $categories, 'slide' => $slides, 'empty_error' => true, 'menus' => $menu]);
    }

    public function getProductDetail($product_id) {
        $comment = $this->commentService->getCommentsOfProduct($product_id);
        $menu = $this->menuService->getMenus();
        $category = $this->categoryService->getCategoriess();
        $productDetail = $this->productService->getProductDetail($product_id);
        $productRelate = $this->productService->getProductRelate($product_id);
        $products = $this->productService->getAllProducts();
        $poinRating = $this->ratingService->getRatingOfProduct($product_id);
        return view('home.product_detail', ['poinRating' => $poinRating, 'products' => $products, 'productDetail' => $productDetail, 'categories' => $category, 'productRelate' => $productRelate, 'menus' => $menu, 'comment' => $comment]);
    }

    public function getProductSearch(Request $request) {
        $productSreach = $this->productService->getSearchProduct($request->key);
        $products = $this->productService->getAllProducts();
        return response()->json([$productSreach, $products]);
    }

    public function getProductSearchToSubmit(Request $request) {
        $menu = $this->menuService->getMenus($request->all());
        $category = $this->categoryService->getCategoriess($request->all());
        $productSreach = $this->productService->getSearchProduct($request->key);
        $slides = $this->slideService->get5Slides();
        if (count($productSreach) > 0) {
            return view('home.sreach_product', ['slide' => $slides, 'productSreach' => $productSreach, 'categories' => $category, 'menus' => $menu]);
        }
        return view('home.error_empty', ['slide' => $slides, 'empty_error' => true, 'menus' => $menu]);
    }

    public function getPriceSegment(Request $request) {
        $menu = $this->menuService->getMenus($request->all());
        $category = $this->categoryService->getCategoriess($request->all());
        $productPrice = $this->productService->getPriceSegment($request->gia);
        $slides = $this->slideService->get5Slides();
        return view('home.product_price', ['slide' => $slides, 'productPrice' => $productPrice, 'categories' => $category, 'menus' => $menu]);
    }

    public function test() {
        $products = $this->productService->getAllProducts();
        return view('test.test', ['product' => $products]);
    }

    public function test2() {
        $products = $this->productService->getAllProducts();
        return view('test.test2', ['product' => $products]);
    }

    public function test3() {
        $products = $this->productService->getNewProduct();
        $sells = $this->productService->getSell();
        return view('test.test3', ['sell' => $sells, 'product' => $products]);
    }

}
