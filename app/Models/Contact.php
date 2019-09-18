<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = ['contract_fullname', 'contract_email', 'contract_phone', 'contract_tittle','product_detail'];

}
