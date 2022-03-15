<?php

namespace App\Repositories;

use App\Models\ColorSchedule;
use App\Repositories\Support\AbstractRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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

    public function getScheduleNormal($schedule){
        $sdata = array();
        $sdata['id'] = "1";
        $sdata['calendarId'] = $schedule->id;
        $sdata['category'] = "time";
        $sdata['title'] = $schedule->title;
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
            $sdata['title'] = $schedule->title;
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
        $date_range = $schedule->pattern == 2 ? $this->getDateByWeekDay($days, $schedule_periods) : $this->getDateByMonthDay($days, $schedule_periods);
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
        $sdata['title'] = $schedule->title;
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
            $sdata['title'] = $schedule->title;
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
        $date_range = $schedule->pattern == 2 ? $this->getDateByWeekDay($days, $schedule_periods) : $this->getDateByMonthDay($days, $schedule_periods);
        $sdata = $this->getFilterScheduleRepeat($date_range, $schedule, $filter);
        return $sdata;
    }
}
