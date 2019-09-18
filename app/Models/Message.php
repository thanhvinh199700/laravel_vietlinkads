<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Message extends Model {

    protected $fillable = ['message','admin_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function message(){
        return $this->belongsTo(Message::class);
    }

}
