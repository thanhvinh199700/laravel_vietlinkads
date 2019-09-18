<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['parent', 'category_name', 'status', 'trash'];

    public function children() {
        return $this->hasMany('App\Models\Category', 'parent', 'id');
    }

    public function parentOne() {
        return $this->hasOne('App\Models\Category', 'id', 'parent');
    }

    public function childrenProducts()
    {
        return $this->hasMany('App\Models\Product','product_category','id');
    }
    public function scopeList($query){
        return $query->where('parent','!=','0');
    }
}

