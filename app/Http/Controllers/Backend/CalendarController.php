<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\TypeSchedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CalendarController extends BaseController
{

    public function index()
    {
        
        $types = TypeSchedule::all();
        $meetings = Meeting::all();
        return view('backend/calendar/index', compact('types','meetings'));
    }
}