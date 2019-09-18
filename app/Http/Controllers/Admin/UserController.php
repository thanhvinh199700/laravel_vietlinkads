<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller {

    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request) {
        $user = $this->userService->getUsers($request->all());
        return view('user.index', ['users' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        try {
            $this->userService->deteleUser($user);
            return redirect('users')->with('success_message', 'delete user sucess');
        } catch (\Exception $e) {
            return redirect('users')->with('error_message', $e->getMessage());
        }
    }

}
