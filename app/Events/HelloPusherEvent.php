<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PresenceChannel;
//use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class HelloPusherEvent implements ShouldBroadcast
{
    use SerializesModels;

    public $message;

    public function __construct($request)
    {
        $this->message  = $request->contents;
    }

    public function broadcastOn() {
        //return new \Illuminate\Broadcasting\PrivateChannel('test2');
        return ['test-channel'];
    }
    
    public function broadcastAs()
    {
        return 'chat.sent';
    }
}
