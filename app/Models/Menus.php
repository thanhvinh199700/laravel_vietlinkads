<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model {

    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = ['menu_name', 'menu_link', 'status', 'trash'];

}
