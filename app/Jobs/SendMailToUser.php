<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendMailToUser implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $user;
    protected $slide;

    public function __construct($user, $slide) {
        $this->user = $user;
        $this->slide = $slide;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $slide = $this->slide;
        foreach ($this->user as $b) {
            $data = array('short' => $slide->short_description, 'content' => $slide->content);
            Mail::send('account.send_promotion_mail', $data, function ($message) use($b) {
                $message->to($b->email, $b->name)->subject('Thông Báo');
            });
        }
    }

}
