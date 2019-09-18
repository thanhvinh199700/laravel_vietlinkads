<?php

namespace App\Listeners;

use App\Events\OrderPaymentOnline;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class SendEmailAfterOrderPaymentOnline {

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
     * @param  OrderPaymentOnline  $event
     * @return void
     */
    public function handle() {
        if (Auth::check()) {
            Mail::send('account.mail', [], function ($message) {
                $message->to(Auth::user()->email, Auth::user()->name)->subject('Đơn hàng của bạn tại sangmobile là : Đã thanh toán qua OnePay');
            });
        }
    }

}
