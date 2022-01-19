<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use DB;

class AuthController extends Controller {

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function getLogin() {
        return view('backend.auth.login');
    }

    public function postLogin(Request $request) {
        $input = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($input)) {
            return Redirect::route('admin.index');
        }
        return Redirect::route('login')->with('error', 'Wrong login account');
    }
  
    public function logout() {
        session_start();
        unset($_SESSION);
        session_destroy();
        Auth::logout();
        return Redirect::route('login');
    }

}
