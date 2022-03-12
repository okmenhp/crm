<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
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

    public function getDateByWeekDay($wdays, $periods, $schedule_periods){
        $result = array();
        foreach($periods as $period){
            $day = $period->format('N');
            if(in_array(++$day, $wdays) && in_array($period, $schedule_periods)){
                array_push($result, $period->format('Y-m-d h:m:s'));
            }
        }
        return $result;
    }

    public function getDateByMonthDay($mdays, $periods, $schedule_periods){
        $result = array();
        foreach($periods as $period){
            $day = $period->format('d');
            if(in_array($day, $mdays) && in_array($period, $schedule_periods)){
                array_push($result, $period->format('Y-m-d h:m:s'));
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
        $sdata['start'] = $schedule->start_date;
        $sdata['end'] = $schedule->end_date;
        $sdata['isAllDay'] = $schedule->all_day;
        $sdata['raw']['schedule_id'] = $schedule->id;
        $sdata['raw']['location'] = $schedule->location;
        $sdata['raw']['meeting_id'] = $schedule->meeting_id;
        $sdata['raw']['description'] = $schedule->description;
        $sdata['raw']['pattern'] = $schedule->pattern;
        $sdata['raw']['type_id'] = $schedule->type_id;
        return $sdata;
    }

    public function getScheduleRepeat($date_range, $schedule){
        $data = array();
        $sdata = array();
        foreach($date_range as $record){
            $sdata['id'] = "1";
            $sdata['calendarId'] = $schedule->id;
            $sdata['category'] = "time";
            $sdata['title'] = $schedule->title;
            $sdata['start'] = $record;
            $sdata['end'] = $record;
            $sdata['isAllDay'] = $schedule->all_day;
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

    public function getDataRepeat($schedule, $start_date, $end_date){ 
        $days = explode(",", $schedule->wday);
        if($schedule->pattern == 3){
            $days = explode(",", $schedule->mday);
        }
        $periods = CarbonPeriod::create(date('Y-m-d', strtotime($start_date)), date('Y-m-d', strtotime($end_date)))->toArray();
        $schedule_periods = CarbonPeriod::create(date('Y-m-d', strtotime($schedule->start_date)), date('Y-m-d', strtotime($schedule->end_date)))->toArray();
        $date_range = $schedule->pattern == 2 ? $this->getDateByWeekDay($days, $periods, $schedule_periods) : $this->getDateByMonthDay($days, $periods, $schedule_periods);
        $sdata = $this->getScheduleRepeat($date_range, $schedule);
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
        $sdata['start'] = $schedule->start_date;
        $sdata['end'] = $schedule->end_date;
        $sdata['isAllDay'] = $schedule->all_day;
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
        // dd($filter);
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
            $sdata['start'] = $record;
            $sdata['end'] = $record;
            $sdata['isAllDay'] = $schedule->all_day;
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

    public function getFilterDateByWeekDay($wdays, $schedule_periods){
        $result = array();
        foreach($schedule_periods as $period){
            $day = $period->format('N');
            if(in_array(++$day, $wdays)){
                array_push($result, $period->format('Y-m-d h:m:s'));
            }
        }
        return $result;
    }

    public function getFilterDateByMonthDay($mdays, $schedule_periods){
        $result = array();
        foreach($schedule_periods as $period){
            $day = $period->format('d');
            if(in_array($day, $mdays)){
                array_push($result, $period->format('Y-m-d h:m:s'));
            }
        }
        return $result;
    }

    public function getFilterDataRepeat($schedule, $filter){
        $days = explode(",", $schedule->wday);
        if($schedule->pattern == 3){
            $days = explode(",", $schedule->mday);
        }
        $schedule_periods = CarbonPeriod::create(date('Y-m-d', strtotime($schedule->start_date)), date('Y-m-d', strtotime($schedule->end_date)))->toArray();
        $date_range = $schedule->pattern == 2 ? $this->getFilterDateByWeekDay($days, $schedule_periods) : $this->getFilterDateByMonthDay($days, $schedule_periods);
        $sdata = $this->getFilterScheduleRepeat($date_range, $schedule, $filter);
        return $sdata;
    }
}
