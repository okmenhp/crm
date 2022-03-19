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
    }

    public function delete(Request $request){
        $this->scheduleRepo->deleteSchedule($request);
        return $this->index();
    }

    public function filter(Request $request){
        $data = $this->scheduleRepo->getFilterSchedule($request);
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
