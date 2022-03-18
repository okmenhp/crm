<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\ColorSchedule;
use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\TypeSchedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CalendarController extends BaseController
{

    public function index()
    {
        
        $types = TypeSchedule::all();
        $meetings = Meeting::all();
        $colors = ColorSchedule::all();
        $users = User::all();
        return view('backend/calendar/index', compact('types','meetings', 'colors', 'users'));
    }

    public function type()
    {
        $records = TypeSchedule::all();
        return view('backend/calendar/type', compact('records'));
    }

    public function createType(Request $request){
        if($request->name == null){
            return Redirect::back()->withErrors("error");
        }
        TypeSchedule::create(['name'=>$request->name]);
        return redirect()->route('admin.calendar.type');
    }

    public function deleteType(Request $request){
        TypeSchedule::find($request->id)->delete();
        return redirect()->route('admin.calendar.type');
    }

    public function updateType(Request $request){
        $type_schedule = TypeSchedule::find($request->id);
        $type_schedule->name = $request->name;
        $type_schedule->save();

        return redirect()->route('admin.calendar.type');
    }

    public function meeting()
    {
        $records = Meeting::all();
        return view('backend/calendar/meeting', compact('records'));
    }

    public function createMeeting(Request $request){
        if($request->name == null){
            return Redirect::back()->withErrors("error");
        }
        Meeting::create(['name'=>$request->name]);
        return redirect()->route('admin.calendar.meeting');
    }

    public function deleteMeeting(Request $request){
        Meeting::find($request->id)->delete();
        return redirect()->route('admin.calendar.meeting');
    }

    public function updateMeeting(Request $request){
        $type_schedule = Meeting::find($request->id);
        $type_schedule->name = $request->name;
        $type_schedule->save();

        return redirect()->route('admin.calendar.meeting');
    }
}