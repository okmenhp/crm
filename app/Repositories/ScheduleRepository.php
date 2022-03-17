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
            $sdata['raw']['schedule_id'] = $schedule->id;
            $sdata['raw']['location'] = $schedule->location;
            $sdata['raw']['meeting_id'] = $schedule->meeting_id;
            $sdata['raw']['description'] = $schedule->description;
            $sdata['raw']['pattern'] = $schedule->pattern;
            $sdata['raw']['type_id'] = $schedule->type_id;
            array_push($data, $sdata);
        }
        return $data;
    }

    public function store($request){
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

    public function updateSchedule($request){
        $record = Schedule::find($request->id);
        $schedules = Schedule::where('uid', $record->uid)->get();
        foreach($schedules as $schedule){
            $schedule->color_id = $request->color_id;
            $schedule->title = $request->title;
            // $schedule->all_day = $request->all_day;
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

    public function getScheduleNormal($schedule){
        $sdata = array();
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
        $sdata['raw']['schedule_id'] = $schedule->id;
        $sdata['raw']['location'] = $schedule->location;
        $sdata['raw']['meeting_id'] = $schedule->meeting_id;
        $sdata['raw']['description'] = $schedule->description;
        $sdata['raw']['pattern'] = $schedule->pattern;
        $sdata['raw']['type_id'] = $schedule->type_id;
        
        return $sdata;
    }

    public function getScheduleRepeat($date_range, $start_time, $end_time, $schedule){
        $data = array();
        $sdata = array();
        foreach($date_range as $record){
            $sdata['id'] = "1";
            $sdata['calendarId'] = $schedule->id;
            $sdata['category'] = "time";
            $sdata['title'] = date('H:i', strtotime($schedule->start_date))." ".$schedule->title;
            $sdata['bgColor'] = $schedule->color_id != null ? ColorSchedule::find($schedule->color_id)->value : null;
            $sdata['borderColor'] = $schedule->color_id != null ? ColorSchedule::find($schedule->color_id)->value : null;
            $sdata['start'] = date('Y-m-d', strtotime($record))."T".$start_time;
            $sdata['end'] = date('Y-m-d', strtotime($record))."T".$end_time;
            // $sdata['isAllDay'] = $schedule->all_day;
            $sdata['raw']['schedule_id'] = $schedule->id;
            $sdata['raw']['location'] = $schedule->location;
            $sdata['raw']['meeting_id'] = $schedule->meeting_id;
            $sdata['raw']['description'] = $schedule->description;
            $sdata['raw']['pattern'] = $schedule->pattern;
            $sdata['raw']['type_id'] = $schedule->type_id;
            array_push($data, $sdata);
        }

        return $data;
    }

    public function getDataRepeat($schedule){
        $days = explode(",", $schedule->wday);
        if($schedule->pattern == 3){
            $days = explode(",", $schedule->mday);
        }
        $start_time = Carbon::parse($schedule->start_date)->format('H:i:s');
        $end_time = Carbon::parse($schedule->end_date)->format('H:i:s');
        $schedule_periods = CarbonPeriod::create(date('Y-m-d', strtotime($schedule->start_date)), date('Y-m-d', strtotime($schedule->end_date)))->toArray();
        if($schedule->pattern == 4){
            $date_range = $this->getEveryDay($schedule_periods);
        }else{
            $date_range = $schedule->pattern == 2 ? $this->getDateByWeekDay($days, $schedule_periods) : $this->getDateByMonthDay($days, $schedule_periods);
        }
        
        $sdata = $this->getScheduleRepeat($date_range, $start_time, $end_time, $schedule);
        return $sdata;
    }

    // Filter

    public function getFilterScheduleNormal($schedule, $filter){
        $sdata = array();
        $sdata['isVisible'] = true;
        if($filter != null){
            if(!in_array($schedule->type_id, $filter)){
                $sdata['isVisible'] = false;
            }
        }else{
            $sdata['isVisible'] = false;
        }
        $sdata['id'] = "1";
        $sdata['calendarId'] = $schedule->id;
        $sdata['category'] = "time";
        $sdata['title'] = date('H:i', strtotime($schedule->start_date))." ".$schedule->title;
        $sdata['bgColor'] = ColorSchedule::find($schedule->color_id)->value;
        $sdata['start'] = $schedule->start_date;
        $sdata['end'] = $schedule->end_date;
        $sdata['raw']['schedule_id'] = $schedule->id;
        $sdata['raw']['location'] = $schedule->location;
        $sdata['raw']['meeting_id'] = $schedule->meeting_id;
        $sdata['raw']['description'] = $schedule->description;
        $sdata['raw']['pattern'] = $schedule->pattern;
        $sdata['raw']['type_id'] = $schedule->type_id;
        return $sdata;
    }

    public function getFilterScheduleRepeat($date_range, $schedule, $filter){
        $data = array();
        $sdata = array();
        foreach($date_range as $record){
            $sdata['isVisible'] = true;
            if($filter != null){
                if(!in_array($schedule->type_id, $filter)){
                    $sdata['isVisible'] = false;
                }
            }else{
                $sdata['isVisible'] = false;
            }
            $sdata['id'] = "1";
            $sdata['calendarId'] = $schedule->id;
            $sdata['category'] = "time";
            $sdata['title'] = date('H:i', strtotime($schedule->start_date))." ".$schedule->title;
            $sdata['bgColor'] = ColorSchedule::find($schedule->color_id)->value;
            $sdata['start'] = $record;
            $sdata['end'] = $record;
            // $sdata['isAllDay'] = $schedule->all_day;
            $sdata['raw']['schedule_id'] = $schedule->id;
            $sdata['raw']['location'] = $schedule->location;
            $sdata['raw']['meeting_id'] = $schedule->meeting_id;
            $sdata['raw']['description'] = $schedule->description;
            $sdata['raw']['pattern'] = $schedule->pattern;
            $sdata['raw']['type_id'] = $schedule->type_id;
            array_push($data, $sdata);
        }

        return $data;
    }

    public function getFilterDataRepeat($schedule, $filter){
        $days = explode(",", $schedule->wday);
        if($schedule->pattern == 3){
            $days = explode(",", $schedule->mday);
        }
        $schedule_periods = CarbonPeriod::create(date('Y-m-d', strtotime($schedule->start_date)), date('Y-m-d', strtotime($schedule->end_date)))->toArray();
        if($schedule->pattern == 3){
            $date_range = $this->getEveryDay($schedule_periods);
        }else{
            $date_range = $schedule->pattern == 2 ? $this->getDateByWeekDay($days, $schedule_periods) : $this->getDateByMonthDay($days, $schedule_periods);
        }
        $sdata = $this->getFilterScheduleRepeat($date_range, $schedule, $filter);
        return $sdata;
    }
}
