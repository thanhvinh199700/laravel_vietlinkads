<?php

namespace App\Services;
use App\Models\Message;
use App\Models\RoomMessage;
class MessageService {
    
    public function userMessage($user){
        return Message::with('user')->where('user_id', $user->id)->get();
    }
    public function adminMessage($user){
        return Message::with('user')->Where('admin_id', $user->id)->get();
    }
    public function userMessages($user){
        return RoomMessage::with('user')->where('room',$user->id)->where('from',$user->id)->get();
    }
    public function adminMessages($user){
        return RoomMessage::with('admin')->where('room',$user->id)->where('to',$user->id)->get();
    }

}
