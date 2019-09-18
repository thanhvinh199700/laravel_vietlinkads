<?php

namespace App\Services;

use App\Models\Product;
use App\Models\OrderDetail;
use DB;

class ProductService {

    public function getProducts() {
        $products = Product::paginate(10);
        //dd($products);
        return $products;
    }

    public function getAllProducts() {
        $products = Product::get();
        //dd($products);
        return $products;
    }

    public function postCreateProduct($data) {
        Product::create([
            'product_category' => $data['selectCatid'],
            'product_name' => $data['inputProductname'],
            'brand_id' => $data['selectBrand'],
            'image' => $data['inputImage'],
            'product_detail' => $data['inputDetail'],
            'sale' => $data['radioSale'],
            'quantity' => $data['inputQuantyti'],
            'price' => $data['inputPrice'],
            'saleprice' => $data['inputSaleprice'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }

    public function updateProduct(array $data, $product) {
        //dd($product);
        $product->update([
            'product_category' => $data['selectCatid'],
            'product_name' => $data['inputProductname'],
            'brand_id' => $data['selectBrand'],
            'image' => $data['inputImage'],
            'product_detail' => $data['inputDetail'],
            'sale' => $data['radioSale'],
            'quantity' => $data['inputQuantyti'],
            'price' => $data['inputPrice'],
            'saleprice' => $data['inputSaleprice'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }

    public function deleteProduct($product) {
        return $product->delete();
    }

    public function getNewProduct() {
        return Product::orderBy('created_at', 'desc')->take(12)->get();
    }

    public function getSaleProduct() {
        return Product::sale()->paginate(12);
    }

    public function getProductCate($category_id) {
        return Product::ofCategory($category_id)->get();
    }

    public function getProductDetail($product_id) {
        return Product::find($product_id);
    }

    public function getSearchProduct() {
        return Product::search()->get();
    }

    public function getProductrelate($product_id) {
        $product = Product::find($product_id);
        return Product::related($product)->take(6)->get();
    }

    public function getPriceSegment() {
        if (request()->get('gia') != null) {
            switch (request()->get('gia')) {
                case'1den5':
                    return Product::wherebetween('price', [1000000, 5000000])->get();
                case'5den10':
                    return Product::wherebetween('price', [5000000, 10000000])->get();
                case'10den15':
                    return Product::wherebetween('price', [10000000, 15000000])->get();
                case'15den20':
                    return Product::wherebetween('price', [15000000, 20000000])->get();
                case'tren20':
                    return Product::wherebetween('price', [20000000, 35000000])->get();
                case'moinhat':
                    return Product::orderBy('created_at', 'desc')->take(12)->get();
                case'sale':
                    return Product::sale()->get();
                default:
                    echo "không thành công";
            }
        }
    }

    public function getSell() {
        return OrderDetail::select(DB::raw('*,sum(qty) as sum'))->with('product')->groupBy('product_id')->orderBy('sum', 'DESC')->take(12)->get();
    }

    public function getRankSell() {
        if (request()->get('rank') != null) {
            switch (request()->get('rank')) {
                case'product':
                    return OrderDetail::select(DB::raw('*,sum(qty) as sum'))->with('product')->groupBy('product_id')->orderBy('sum', 'DESC')->get();
                case'brand':
                    return OrderDetail::select(DB::raw('*,sum(qty) as sum'))->with('brand')->groupBy('brand_id')->orderBy('sum', 'DESC')->get();
                case'category':
                    return OrderDetail::select(DB::raw('*,sum(qty) as sum'))->with('category')->groupBy('category_id')->orderBy('sum', 'DESC')->get();
                default :
                    return OrderDetail::select(DB::raw('*,sum(qty) as sum'))->with('product')->groupBy('product_id')->orderBy('sum', 'DESC')->get();
            }
        }
    }

}
