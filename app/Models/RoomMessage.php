<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomMessage extends Model {

    protected $table = 'room_messages';
    protected $fillable = ['room', 'from', 'to', 'message', 'create_at'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'room', 'id');
    }

    public function admin() {
        return $this->belongsTo('App\Models\User', 'from', 'id');
    }

}
