<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
class RegistrationController extends Controller
{
    public function showRegisterForm()
    {
        return view('account.registration');
    }

    public function register(Request $request)
    {
    	$userService = new UserService;
    	$userService->register($request->only(['fullname','email','pass','avatar','phone','address','role'])); 

    	return '<script type="text/javascript">alert("đăng ký thành công");</script>'.redirect('/');    
    }
    
}
