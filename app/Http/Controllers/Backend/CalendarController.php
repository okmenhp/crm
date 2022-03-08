<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Schedule;

class CalendarController extends BaseController
{

    public function index()
    {
        $schedules = Schedule::all();
        // dd($schedules);
        return view('backend/calendar/index');
    }
}