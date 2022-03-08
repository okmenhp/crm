<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
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
}
