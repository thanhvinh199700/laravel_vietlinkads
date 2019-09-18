<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table='comments';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'product_id', 'comment_date', 'comment_content','avatar','trash','status'];
    
    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
