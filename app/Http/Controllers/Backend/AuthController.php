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
}