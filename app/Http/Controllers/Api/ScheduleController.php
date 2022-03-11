<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
                    $data = array_merge($data, $this->scheduleRepo->getDataRepeat($schedule, $request->start_date, $request->end_date));
                }elseif($schedule->pattern == 3){
                    // $mdays = explode(",", $schedule->mday);
                    // $periods = CarbonPeriod::create(date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date)))->toArray();
                    // $schedule_periods = CarbonPeriod::create(date('Y-m-d', strtotime($schedule->start_date)), date('Y-m-d', strtotime($schedule->end_date)))->toArray();
                    // $date_range = $this->scheduleRepo->getDateByMonthDay($mdays, $periods, $schedule_periods);
                    // $sdata = $this->scheduleRepo->getScheduleRepeat($date_range, $schedule);
                    $data = array_merge($data, $this->scheduleRepo->getDataRepeat($schedule, $request->start_date, $request->end_date));
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

    public function insert(Request $request){
        $data = array();
        $data['title'] = $request->title;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['location'] = $request->location;
        $data['meeting_id'] = $request->meeting;
        $data['type_id'] = $request->type;
        $data['description'] = $request->description;
        $data['pattern'] = $request->pattern;
        if($data['pattern'] == 2){
            $data['wday'] = $request->day_repeat;
        }elseif($data['pattern'] == 3){
            $data['mday'] = $request->day_repeat;
        }
        $schedule = Schedule::create($data);
        $schedule->users()->attach(Auth::id());
        if($request->attendees != null){
            $attendees = explode(",", $request->attendees);
            foreach($attendees as $attendee){
                $schedule->users()->attach($attendee);
            }
        }
        $sdata = $this->scheduleRepo->getScheduleNormal($schedule);
        if($data['pattern'] != 1){
            $sdata = $this->scheduleRepo->getDataRepeat($schedule, $request->start_date, $request->end_date);
        }

        return response()->json(['data'=>$sdata]);
    }

    public function update(Request $request){        
        $schedule = Schedule::find($request->id);
        $old_pattern = $schedule->pattern;

        $schedule->title = $request->title;
        $schedule->start_date = $request->start_date;
        $schedule->end_date = $request->end_date;
        $schedule->location = $request->location;
        $schedule->meeting_id = $request->meeting;
        $schedule->type_id = $request->type;
        $schedule->description = $request->description;
        $schedule->pattern = $request->pattern;
        if($schedule->pattern == 2){
            $schedule->wday = $request->day_repeat;
        }elseif($schedule->pattern == 3){
            $schedule->mday = $request->day_repeat;
        }
        $schedule->save();
        
        if($request->attendees != null){
            $users = User::where('id','!=',Auth::id())->get();
            $attendees = UserSchedule::where('schedule_id',$schedule->id)->where('user_id','!=',Auth::id())->pluck('user_id')->toArray();
            foreach($users as $user){
                if(in_array($user->id, explode(",", $request->attendees)) && !in_array($user->id, $attendees)){
                    $schedule->users()->attach($user->id);
                }else{
                    $schedule->users()->detach($user->id);
                }
            }
        }
        $sdata = $this->scheduleRepo->getScheduleNormal($schedule);
        if($schedule->pattern != 1){
            $sdata = $this->scheduleRepo->getDataRepeat($schedule, $request->start_date, $request->end_date);
        }

        return response()->json(['data'=>$sdata, 'pattern'=>$schedule->pattern ,'old_pattern'=>$old_pattern]);
    }

    public function delete(Request $request){
        Schedule::find($request->id)->delete();
        UserSchedule::where('schedule_id',$request->id)->delete();

        return response()->json(['data'=>'Xóa thành công']);
    }

    public function typeEdit(Request $request){
        $record = TypeSchedule::find($request->id);
        
        return response()->json(['data'=>$record]);
    }
}
