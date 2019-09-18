<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['product_category', 'brand_id', 'product_name', 'image', 'product_detail', 'sale', 'quantity', 'price', 'saleprice', 'trash', 'status'];

    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'product_category');
    }

    public function scopeSale($query) {
        return $query->where('sale', 1);
    }

    public function scopeOfCategory($query, $category) {
        return $query->where('product_category', $category);
    }

    public function scopeSearch($query) {
        return $query->where('product_name', 'like', '%' . request()->get('key') . '%');
    }

    public function scopeRelated($query, $product) {
        return $query->where('product_category', $product->product_category)->where('id', '!=', $product->id);
    }

}
