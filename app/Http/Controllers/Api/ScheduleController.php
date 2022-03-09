<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\TypeSchedule;
use App\Models\User;
use App\Repositories\ScheduleRepository;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    use ApiResponse;
    
    public function __construct(ScheduleRepository $scheduleRepo) {
        $this->scheduleRepo = $scheduleRepo;
    }

    public function index(Request $request){
        $data = array();
        
        if($request->type == 'toggle-monthly'){
            $start_date = date('Y-m-d', strtotime($request->start_date));
            $end_date = date('Y-m-d', strtotime($request->end_date));
            
            $schedules = Schedule::whereIn('id', User::find(Auth::id())->schedules()->pluck('schedule_id')->toArray())->where('start_date','>=',$start_date)->where('start_date','<=',$end_date)->get();
           
            foreach($schedules as $key => $schedule){
                if($schedule->pattern == 1){
                    $sdata = $this->scheduleRepo->getScheduleNormal($schedule);
                    array_push($data, $sdata);
                }elseif($schedule->pattern == 2){
                    $wdays = explode(",", $schedule->wday);
                    $periods = CarbonPeriod::create(date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date)))->toArray();
                    $date_range = $this->scheduleRepo->getDateByWeekDay($wdays, $periods);
                    $sdata = $this->scheduleRepo->getScheduleRepeat($date_range, $schedule);
                    $data = array_merge($data, $sdata);
                }elseif($schedule->pattern == 3){
                    $mdays = explode(",", $schedule->mday);
                    $periods = CarbonPeriod::create(date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date)))->toArray();
                    $date_range = $this->scheduleRepo->getDateByMonthDay($mdays, $periods);
                    $sdata = $this->scheduleRepo->getScheduleRepeat($date_range, $schedule);
                    $data = array_merge($data, $sdata);
                }
            }
        }

        return response()->json(['data'=>$data]);
    }

    public function detail(Request $request){
        $result = array();
        $schedule = Schedule::find($request->id);
        $user_schedule = array_diff($schedule->users()->pluck('user_id')->toArray(), [Auth::id()]);

        $result['pattern'] = $schedule->pattern;
        $result['wday'] = explode(',', $schedule->wday);
        $result['mday'] = explode(',', $schedule->mday);
        $result['title'] = $schedule->title;
        $result['start_date'] = date('Y-m-d', strtotime($schedule->start_date))."T".date('h:m', strtotime($schedule->start_date));
        $result['end_date'] = date('Y-m-d', strtotime($schedule->end_date))."T".date('h:m', strtotime($schedule->end_date));
        $result['location'] = $schedule->location;
        $result['meeting_id'] = $schedule->meeting_id;
        $result['type_id'] = $schedule->type_id;
        $result['users'] = User::where('id','!=',Auth::id())->get();
        $result['user_id'] = $result['user_name'] = array();
        foreach($user_schedule as $key => $record){
            $name = User::find($record)->full_name;
            $result['user_id'][$key] = $record;
            $result['user_name'][$key] = $name;
        }
        $result['description'] = $schedule->description;
        
        return response()->json(['data'=>$result]);
    }

    public function defaultFormInsert(){
        $users = User::where('id','!=',Auth::id())->get();

        return response()->json(['data'=>$users]);
    }
}