<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailToUser;
use App\Services\UserService;
use App\Services\SlideService;
use App\Models\Slide;
class SendMailController extends Controller {

    protected $userService;
    protected $slideService;

    public function __construct(UserService $userService, SlideService $slideService) {
        $this->userService = $userService;
        $this->slideService = $slideService;
    }

    public function sendMailToUser(Slide $slide) {
        $user = $this->userService->getUsers();
        $this->dispatch(new SendMailToUser($user,$slide));
        return redirect()->back()->with('message','Gửi thông báo tới khách hàng thành công');
    }

}
