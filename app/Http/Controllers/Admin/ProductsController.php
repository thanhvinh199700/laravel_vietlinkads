<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\BrandService;

class ProductsController extends Controller {

    protected $brandService;
    protected $categoryService;
    protected $productService;

    public function __construct(BrandService $brandService, CategoryService $categoryService, ProductService $productService) {
        $this->brandService = $brandService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


        $categories = $this->categoryService->getCategories($request->all());
        $brands = $this->brandService->getBrands($request->all());
        $products = $this->productService->getProducts($request->all());
//        $sells = $this->productService->getSell($request->all());
//        $brandSells = $this->productService->getBrandSell($request->all());
//        $categorySells = $this->productService->getCategorySell($request->all());
//        $sells = $this->productService->getRankSell($request->rank);
//        dd($sells);
        return view('product.index', ['products' => $products, 'brand' => $brands, 'category' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $brand = $this->brandService->getBrands($request->all());
        $category = $this->categoryService->getCategories($request->all());
        return view('product.create', ['category' => $category, 'brand' => $brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'inputProductname' => 'required|unique:product,product_name',
        ]);

        $this->productService->postCreateProduct($request->all());
        return redirect('product')->with('success_message', 'add product sucess');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formEdit(Request $request, Product $product) {

        $categories = $this->categoryService->getCategories($request->all());
        $brands = $this->brandService->getBrands($request->all());
        $products = $this->productService->getProductDetail($product->id);
        return view('product.edit', ['brand' => $brands, 'category' => $categories, 'product' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) {

        $this->productService->updateProduct($request->all(), $product);
        return redirect('product')->with('success_message', 'update product sucess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {

        $this->productService->deleteProduct($product);
        return redirect('product')->with('success_message', 'delete product sucess');
    }

    public function getRankSell(Request $request) {
        $sell = $this->productService->getRankSell($request->rank);
        return response()->json($sell);
    }

}
