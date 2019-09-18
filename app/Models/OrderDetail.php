<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {

    protected $table = 'order_detail';
    protected $fillable = ['order_id', 'product_id', 'qty', 'product_price', 'total', 'trash', 'status', 'brand_id', 'category_id'];

    public function product(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function brand() {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }
    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    public function order(){
         return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }

}
