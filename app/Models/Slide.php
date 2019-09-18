<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
     protected $table='slide';
    protected $primaryKey = 'id';
    protected $fillable = ['tittle', 'short_description', 'slide_image', 'content','trash', 'status'];
}
