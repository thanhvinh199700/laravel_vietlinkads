<?php

//

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Events\MessageSent;
use App\Models\RoomMessage;

class MessagesController extends Controller {

    public function sendMessageAdmin(Request $request) {
        if (session()->has('admin')) {
            $admin = session('admin');
            $admin->messages()->create([
                'message' => $request->input('contents'),
                'admin_id' => $request->input('id'),
            ]);
            RoomMessage::create([
                'room' => $request->input('id'),
                'from' => $admin->id,
                'to' => $request->input('id'),
                'message' => $request->input('contents')
            ]);
            broadcast(new MessageSent($admin, $request->contents, $request->input('id')));
        }
        return response()->json([$admin, $request->contents]);
    }

}
