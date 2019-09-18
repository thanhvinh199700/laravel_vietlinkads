<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class LoginController extends Controller {

    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $userService = new UserService;
        $result = $userService->login($request->only(['email', 'password']));
        //dd($result);
        if ($result === 0) {
            return '<script type="text/javascript">alert("đăng nhập thất bại");</script>' . redirect('user/login');
        } else {
            return '<script type="text/javascript">alert("đăng nhập thành công");</script>' . redirect('/');
        }
    }

    public function showAdminLoginForm() {
        return view('account.adminlogin');
    }

    public function loginAdmin(Request $request) {
        $userService = new UserService;
        $result = $userService->loginAdmin($request->only(['email', 'password', 'role']));
        //dd($result);
        if ($result === 0) {
            return '<script type="text/javascript">alert("đăng nhập thất bại");</script>' . redirect('user/login_admin');
        } else {
            return '<script type="text/javascript">alert("đăng nhập thành công");</script>' . redirect('/admin');
        }
    }

    public function logoutUser(Request $request) {
        if (session()->has('name')) {
            session()->forget('name');
        }
        return '<script type="text/javascript">alert("đăng Xuất thành công");</script>' . redirect('/');
    }

    public function logoutAdmin(Request $request) {
        if (session()->has('admin')) {
            session()->forget('admin');
        }
        return '<script type="text/javascript">alert("đăng Xuất thành công");</script>' . redirect()->back();
    }

}
