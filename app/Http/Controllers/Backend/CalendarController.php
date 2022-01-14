<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CalendarController extends BaseController
{

    public function index()
    {
        return view('backend/calendar/index');
    }
}