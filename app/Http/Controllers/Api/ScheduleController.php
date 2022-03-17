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
        $result = array();
        $schedule = Schedule::find($request->id);
        $user_schedule = array_diff($schedule->users()->pluck('user_id')->toArray(), [Auth::id()]);

        $result['pattern'] = $schedule->pattern;
        $result['wday'] = explode(',', $schedule->wday);
        $result['mday'] = explode(',', $schedule->mday);
        $result['title'] = $schedule->title;
        // $result['all_day'] = $schedule->all_day;
        $result['color']['id'] = ColorSchedule::find($schedule->color_id)->id;
        $result['color']['name'] = ColorSchedule::find($schedule->color_id)->name;
        $result['color']['value'] = ColorSchedule::find($schedule->color_id)->value;
        $result['start_date'] = date('Y-m-d', strtotime($schedule->start_date))."T".date('h:i', strtotime($schedule->start_date));
        $result['end_date'] = date('Y-m-d', strtotime($schedule->end_date))."T".date('h:i', strtotime($schedule->end_date));
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
        $current_datetime = Carbon::now()->format('Y-m-d').'T00:00';

        return response()->json(['data'=>$users, 'current_datetime'=>$current_datetime]);
    }

    public function insert(Request $request){
        $this->scheduleRepo->store($request);
        return $this->index();
    }

    public function update(Request $request){      
        // $schedule = Schedule::find($request->id);
        // $schedule->color_id = $request->color_id;
        // $schedule->title = $request->title;
        // // $schedule->all_day = $request->all_day;
        // $schedule->start_date = $request->start_date;
        // $schedule->end_date = $request->end_date;
        // $schedule->location = $request->location;
        // $schedule->meeting_id = $request->meeting;
        // $schedule->type_id = $request->type;
        // $schedule->description = $request->description;
        // $schedule->pattern = $request->pattern;
        // if($schedule->pattern == 2){
        //     $schedule->wday = $request->day_repeat;
        // }elseif($schedule->pattern == 3){
        //     $schedule->mday = $request->day_repeat;
        // }
        // $schedule->save();
        
        // if($request->attendees != null){
        //     $users = User::where('id','!=',Auth::id())->get();
        //     $attendees = UserSchedule::where('schedule_id',$schedule->id)->where('user_id','!=',Auth::id())->pluck('user_id')->toArray();
        //     foreach($users as $user){
        //         if(in_array($user->id, explode(",", $request->attendees)) && !in_array($user->id, $attendees)){
        //             $schedule->users()->attach($user->id);
        //         }else{
        //             $schedule->users()->detach($user->id);
        //         }
        //     }
        // }
        $this->scheduleRepo->updateSchedule($request);
        return $this->index();
    }

    public function delete(Request $request){
        $schedule = Schedule::find($request->id);
        $day_selected = Carbon::parse($request->date_selected)->format('Y-m-d h:i:s');
        // 0: hiện tại và trước đó | 1: hiện tại và sau đó | 2/else: tất cả
        if($request->type == 0){
            $schedule['start_date'] = Carbon::parse($day_selected)->addDays(1)->format('Y-m-d h:i:s');
            $schedule->save();
        }elseif($request->type == 1){
            $schedule['end_date'] = Carbon::parse($day_selected)->subDays(1)->format('Y-m-d h:i:s');
            $schedule->save();
        }else{
            Schedule::find($request->id)->delete();
            UserSchedule::where('schedule_id',$request->id)->delete();
        }

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
