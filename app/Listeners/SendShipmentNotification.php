<?php

namespace App\Listeners;

use App\Events\OrderPayment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipmentNotification implements ShouldQueue {

    use InteractsWithQueue;

    public function handle(OrderPayment $event) {
        if (true) {
            $this->release(30);
        }
    }

    public function failed(OrderShipped $event, $exception) {
        //
    }

}
