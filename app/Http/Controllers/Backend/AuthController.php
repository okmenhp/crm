<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{

        public function login()
    {
        return view('backend.auth.login');
    }

        public function forgot_password()
    {
        return view('backend.auth.forgot_password');
    }


}