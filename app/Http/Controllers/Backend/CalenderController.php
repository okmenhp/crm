<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CalenderController extends BaseController
{

    public function index()
    {
        return view('backend/calendar/index');
    }
}