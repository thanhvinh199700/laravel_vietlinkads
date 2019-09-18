<?php

namespace App\Listeners;

use App\Events\OrderPayment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailAfterOrderPayment implements ShouldQueue {

    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPayment  $event
     * @return void
     */
    public function handle(OrderPayment $event) {
        Mail::send('account.mail', [], function ($message) use($event) {
            $message->to($event->user->email,$event->user->name)->subject('Đơn hàng của bạn tại sangmobile là : Thanh toán tại nhà');
        });
        return false;
    }

}
