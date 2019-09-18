<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
//use App\Models\Message;
use App\Models\RoomMessage;
use Illuminate\Http\Request;
Use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\MessageService;

class MessageController extends Controller {

    protected $messageService;

    public function __construct(MessageService $messageService) {
        $this->messageService = $messageService;
    }

    public function index() {
        return view('chat');
    }

    public function messageUser(User $user) {
        $messages = $this->messageService->userMessage($user);
        $adminSendMessage = $this->messageService->adminMessage($user);
        return view('message.message', ['message' => $messages, 'adminSendMessage' => $adminSendMessage]);
    }

    public function sendMessageUser(Request $request) {
        
        if ($request->to == null) {
            broadcast(new MessageSent(Auth::user(), $request->contents, 8));
            Auth::user()->messages()->create([
                'message' => $request->input('contents'),
                'admin_id' => 8,
            ]);
            RoomMessage::create([
                'room' => Auth::user()->id,
                'from' => Auth::user()->id,
                'to' => 8,
                'message' => $request->input('contents')
            ]);
        } else {
            broadcast(new MessageSent(Auth::user(), $request->contents, $request->to));
            Auth::user()->messages()->create([
                'message' => $request->input('contents'),
                'admin_id' => $request->to,
            ]);
            RoomMessage::create([
                'room' => Auth::user()->id,
                'from' => Auth::user()->id,
                'to' => $request->to,
                'message' => $request->input('contents')
            ]);
        }

        return response()->json([Auth::user(), $request->contents]);
    }

}
