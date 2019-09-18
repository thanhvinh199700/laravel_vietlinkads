<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
class SendMailAfterPaymentOnline implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public $order;

    public function __construct($user, $order) {
        $this->user = $user;
        $this->order = $order;
        //dd('zo day r ne');
        //dd($user);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $cart = $this->order->items;
        $data = array('detail' => $cart, 'totalqty' => $this->order->totalQty, 'totalprice' => $this->order->totalPrice);
        //dd($data);
        Mail::send('account.mail', $data, function ($message) {
            $message->to($this->user->email, $this->user->name)->subject('Đơn hàng của bạn tại sangmobile là : Đã thanh toán Online tại OnePay');
        });
    }

}
