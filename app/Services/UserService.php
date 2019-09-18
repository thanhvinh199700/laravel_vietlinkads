<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserService {

    public function register(array $data) {
        return User::create([
                    'name' => $data['fullname'],
                    'email' => $data['email'],
                    'avatar' => $data['avatar'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'role' => 'user',
                    'password' => bcrypt($data['pass']),
        ]);
    }

    public function loginAdmin($data) {
        $login = User::loggedIn($data)->isAdmin()->first();
        if ($login == true) {
            $check = Hash::check($data['password'], $login->password);
            if ($check == true) {
                session()->put('admin', $login);
                
            }
            return 1;
        } else {
            return 0;
        }
    }

//    public function getUsers() {
//        $users = DB::table('users')->get();
//        return $users;
//    }

    public function deteleUser($user) {
        if ($user->role == 'admin') {
            throw new \Exception('cannot admin');
        } else {
            $user->delete();
        }
    }

    public function getUsers() {
        return User::where('role', 'user')->get();
    }

}
