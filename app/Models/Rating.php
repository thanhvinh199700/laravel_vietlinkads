<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

    protected $table = 'rating';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'user_id','rating'];

}
