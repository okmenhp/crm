<?php

namespace App\Repositories;

use App\Models\ColorSchedule;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserSchedule;
use App\Repositories\Support\AbstractRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\Schedule';
    }

    public function validateCreate() {
        return $rules = [
            'name' => 'required',
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
        ];
    }

    public function validateUpdateWithPassword($id) {
        return $rules = [
            'username' => 'required|unique:user,username,' . $id . ',id',
            'password' => 'min:6|max:32',
            'c_password' => 'min:6|max:32|same:password',
        ];
    }

    public function getSchedule(){
        $data = array();
        $schedules = Schedule::whereIn('id', User::find(Auth::id())->schedules()->pluck('schedule_id')->toArray())->get();
        foreach($schedules as $schedule){
            $sdata['id'] = "1";
            $sdata['calendarId'] = $schedule->id;
            $sdata['category'] = "time";
            $range = Carbon::parse($schedule->start_date)->diffInDays(Carbon::parse($schedule->end_date));
            if($range > 0){
                $sdata['title'] = $schedule->title;
            }else{
                $sdata['title'] = date('H:i', strtotime($schedule->start_date))." ".$schedule->title;
            }
            // $schedule->all_day == 1 ? $sdata['isAllDay'] = true : $sdata['isAllDay'] = false;
            $sdata['bgColor'] = $schedule->color_id != null ? ColorSchedule::find($schedule->color_id)->value : null;
            $sdata['borderColor'] = $schedule->color_id != null ? ColorSchedule::find($schedule->color_id)->value : null;
            $sdata['start'] = $schedule->start_date;
            $sdata['end'] = $schedule->end_date;
            $sdata['attendees'] = [];
            $attendees_id = $schedule->users()->pluck('user_id')->toArray();
            foreach($attendees_id as $record){
                array_push($sdata['attendees'], User::find($record)->full_name);
            }
            $sdata['raw']['schedule_id'] = $schedule->id;
            $sdata['raw']['uid'] = $schedule->uid;
            $sdata['raw']['location'] = $schedule->location;
            $sdata['raw']['meeting_id'] = $schedule->meeting_id;
            $sdata['raw']['description'] = $schedule->description;
            $sdata['raw']['pattern'] = $schedule->pattern;
            $sdata['raw']['type_id'] = $schedule->type_id;
            array_push($data, $sdata);
        }
        return $data;
    }

    public function getDetailSchedule($request){
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
        if($result['pattern'] != 1){
            $start_record = Schedule::where('uid', $schedule->uid)->first();
            $end_record = Schedule::where('uid', $schedule->uid)->orderBy('id', 'desc')->first();
            $result['start_date'] = date('Y-m-d', strtotime($start_record->start_date))."T".date('H:i', strtotime($start_record->start_date));
            $result['end_date'] = date('Y-m-d', strtotime($end_record->end_date))."T".date('H:i', strtotime($end_record->end_date));
        }else{
            $result['start_date'] = date('Y-m-d', strtotime($schedule->start_date))."T".date('H:i', strtotime($schedule->start_date));
            $result['end_date'] = date('Y-m-d', strtotime($schedule->end_date))."T".date('H:i', strtotime($schedule->end_date));
        }
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

        return $result;
    }

    public function dataScheduleChange($request){
        if($request->uid != null){
            $schedules = Schedule::where('uid', $request->uid)->get();
            foreach($schedules as $schedule){
                UserSchedule::where('schedule_id',$schedule->id)->delete();
                $schedule->delete();
            }
        }
        $data = array();
        $last_record_uid = Schedule::latest()->first();
        if($last_record_uid == null){
            $last_record_uid = 0;
        }else{
            $last_record_uid = ++$last_record_uid->uid;
        }
        $data['uid'] = $last_record_uid;
        if($request->pattern == 1){
            $data['color_id'] = $request->color_id;
            $data['title'] = $request->title;
            // $data['all_day'] = $request->all_day;
            $data['start_date'] = $request->start_date;
            $data['end_date'] = $request->end_date;
            $data['location'] = $request->location;
            $data['meeting_id'] = $request->meeting;
            $data['type_id'] = $request->type;
            $data['description'] = $request->description;
            $data['pattern'] = $request->pattern;
            $schedule = Schedule::create($data);
            $schedule->users()->attach(Auth::id());
            if($request->attendees != null){
                $attendees = explode(",", $request->attendees);
                foreach($attendees as $attendee){
                    $schedule->users()->attach($attendee);
                }
            }
        }else if($request->pattern != 1){
            $days = explode(",", $request->day_repeat);
            if($request->pattern == 2){
                $data['wday'] = $request->day_repeat;
            }else if($request->pattern == 3){
                $data['mday'] = $request->day_repeat;
            }
            $start_time = Carbon::parse($request->start_date)->format('H:i:s');
            $end_time = Carbon::parse($request->end_date)->format('H:i:s');
            $schedule_periods = CarbonPeriod::create(date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date)))->toArray();
            if($request->pattern == 4){
                $date_range = $this->getEveryDay($schedule_periods);
            }else{
                $date_range = $request->pattern == 2 ? $this->getDateByWeekDay($days, $schedule_periods) : $this->getDateByMonthDay($days, $schedule_periods);
            }

            foreach($date_range as $record){
                $data['color_id'] = $request->color_id;
                $data['title'] = $request->title;
                // $data['all_day'] = $request->all_day;
                $data['start_date'] = date('Y-m-d', strtotime($record))." ".$start_time;
                $data['end_date'] = date('Y-m-d', strtotime($record))." ".$end_time;
                $data['location'] = $request->location;
                $data['meeting_id'] = $request->meeting;
                $data['type_id'] = $request->type;
                $data['description'] = $request->description;
                $data['pattern'] = $request->pattern;
                $schedule = Schedule::create($data);
                $schedule->users()->attach(Auth::id());
                if($request->attendees != null){
                    $attendees = explode(",", $request->attendees);
                    foreach($attendees as $attendee){
                        $schedule->users()->attach($attendee);
                    }
                }
            }
        }
    }

    public function deleteSchedule($request){
        $schedule = Schedule::find($request->id);
        // 0: hiện tại và trước đó | 1: hiện tại và sau đó | 2/else: tất cả
        if($request->type == 0){
            $records = Schedule::where('uid', $schedule->uid)->where('end_date','<=',$schedule->end_date)->get();
            foreach($records as $record){
                UserSchedule::where('schedule_id',$record->id)->delete();
                $record->delete();
            }
        }elseif($request->type == 1){
            $records = Schedule::where('uid', $schedule->uid)->where('start_date','>=',$schedule->start_date)->get();
            foreach($records as $record){
                UserSchedule::where('schedule_id',$record->id)->delete();
                $record->delete();
            }
        }else{
            Schedule::where('uid', $schedule->uid)->delete();
            UserSchedule::where('schedule_id',$request->id)->delete();
        }
    }

    public function getDateByWeekDay($wdays, $schedule_periods){
        $result = array();
        foreach($schedule_periods as $period){
            $day = $period->format('N');
            if(in_array(++$day, $wdays)){
                array_push($result, $period->format('Y-m-d H:i:s'));
            }
        }
        return $result;
    }

    public function getDateByMonthDay($mdays, $schedule_periods){
        $result = array();
        foreach($schedule_periods as $period){
            $day = $period->format('d');
            if(in_array($day, $mdays)){
                array_push($result, $period->format('Y-m-d h:i:s'));
            }
        }
        return $result;
    }

    public function getEveryDay($schedule_periods){
        $result = array();
        foreach($schedule_periods as $period){
            array_push($result, $period->format('Y-m-d H:i:s'));
        }
        return $result;
    }

    // Filter
    public function getFilterSchedule($request){
        $data = array();
        $schedules = Schedule::whereIn('id', User::find(Auth::id())->schedules()->pluck('schedule_id')->toArray())->get();

        foreach($schedules as $schedule){
            $sdata['isVisible'] = true;
            if($request->search_user != null){
                foreach($schedule->users()->pluck('user_id')->toArray() as $record){
                    if(in_array($record, explode(',', $request->search_user))){
                        $sdata['isVisible'] = true;
                        break;
                    }else{
                        $sdata['isVisible'] = false;
                    }
                }
            }else{
                $sdata['isVisible'] = false;
                break;
            }
            if($request->type != null){
                if(!in_array($schedule->type_id, explode(',', $request->type))){
                    $sdata['isVisible'] = false;
                    break;
                }
            }else{
                $sdata['isVisible'] = false;
                break;
            }
            if(!str_contains($schedule->title, $request->search_title)) { 
                $sdata['isVisible'] = false;
                break;
            }
            $sdata['id'] = "1";
            $sdata['calendarId'] = $schedule->id;
            $sdata['category'] = "time";
            $range = Carbon::parse($schedule->start_date)->diffInDays(Carbon::parse($schedule->end_date));
            if($range > 0){
                $sdata['title'] = $schedule->title;
            }else{
                $sdata['title'] = date('H:i', strtotime($schedule->start_date))." ".$schedule->title;
            }
            // $schedule->all_day == 1 ? $sdata['isAllDay'] = true : $sdata['isAllDay'] = false;
            $sdata['bgColor'] = $schedule->color_id != null ? ColorSchedule::find($schedule->color_id)->value : null;
            $sdata['borderColor'] = $schedule->color_id != null ? ColorSchedule::find($schedule->color_id)->value : null;
            $sdata['start'] = $schedule->start_date;
            $sdata['end'] = $schedule->end_date;
            $sdata['attendees'] = [];
            $attendees_id = $schedule->users()->pluck('user_id')->toArray();
            foreach($attendees_id as $record){
                array_push($sdata['attendees'], User::find($record)->full_name);
            }
            $sdata['raw']['schedule_id'] = $schedule->id;
            $sdata['raw']['uid'] = $schedule->uid;
            $sdata['raw']['location'] = $schedule->location;
            $sdata['raw']['meeting_id'] = $schedule->meeting_id;
            $sdata['raw']['description'] = $schedule->description;
            $sdata['raw']['pattern'] = $schedule->pattern;
            $sdata['raw']['type_id'] = $schedule->type_id;
            array_push($data, $sdata);
        }
        return $data;
    }
}
