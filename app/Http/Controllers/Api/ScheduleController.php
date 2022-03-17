<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ColorSchedule;
use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\TypeSchedule;
use App\Models\User;
use App\Models\UserSchedule;
use App\Repositories\ScheduleRepository;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    use ApiResponse;
    
    public function __construct(ScheduleRepository $scheduleRepo) {
        $this->scheduleRepo = $scheduleRepo;
    }

    public function index(){
        $data = $this->scheduleRepo->getSchedule();
        return response()->json(['data'=>$data]);
    }

    public function detail(Request $request){
        $result = $this->scheduleRepo->getDetailSchedule($request);
        
        return response()->json(['data'=>$result]);
    }

    public function defaultFormInsert(){
        $users = User::where('id','!=',Auth::id())->get();
        $current_datetime = Carbon::now()->format('Y-m-d').'T00:00';

        return response()->json(['data'=>$users, 'current_datetime'=>$current_datetime]);
    }

    public function dataScheduleChange(Request $request){
        $this->scheduleRepo->dataScheduleChange($request);
        return $this->index();
    }

    public function delete(Request $request){
        // $schedule = Schedule::find($request->id);
        // $day_selected = Carbon::parse($request->date_selected)->format('Y-m-d h:i:s');
        // // 0: hiện tại và trước đó | 1: hiện tại và sau đó | 2/else: tất cả
        // if($request->type == 0){
        //     $schedule['start_date'] = Carbon::parse($day_selected)->addDays(1)->format('Y-m-d h:i:s');
        //     $schedule->save();
        // }elseif($request->type == 1){
        //     $schedule['end_date'] = Carbon::parse($day_selected)->subDays(1)->format('Y-m-d h:i:s');
        //     $schedule->save();
        // }else{
        //     Schedule::find($request->id)->delete();
        //     UserSchedule::where('schedule_id',$request->id)->delete();
        // }
        $this->scheduleRepo->deleteSchedule($request);
        return $this->index();
    }

    public function filter(Request $request){
        $data = array();
        $schedules = Schedule::whereIn('id', User::find(Auth::id())->schedules()->pluck('schedule_id')->toArray())->get();
        foreach($schedules as $schedule){
            if($schedule->pattern == 1){
                $sdata = $this->scheduleRepo->getFilterScheduleNormal($schedule, $request->type);
                array_push($data, $sdata);
            }else{
                $data = array_merge($data, $this->scheduleRepo->getFilterDataRepeat($schedule, $request->type));
            }
        }
        return response()->json(['data'=>$data]);
    }

    public function typeEdit(Request $request){
        $record = TypeSchedule::find($request->id);
        
        return response()->json(['data'=>$record]);
    }

    public function meetingEdit(Request $request){
        $record = Meeting::find($request->id);
        
        return response()->json(['data'=>$record]);
    }
}
