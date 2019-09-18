<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brand';
     protected $fillable = ['brand_name','status','trash'];
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function productChildren(){
        return $this->hasMany('App\Models\Product','brand_id','id');
    }
}
