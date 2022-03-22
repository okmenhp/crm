<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Traits\ApiResponse;
use Storage;
use App\Repositories\FileRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\UserRepository;
use App\Repositories\ListRepository;
use App\Repositories\TaskRepository;
use App\Models\Task;
use App\Models\UserTask;

class KanbanController extends BaseController
{
	use ApiResponse;

    public function __construct(FileRepository $fileRepo, DepartmentRepository $departmentRepo, UserRepository $userRepo, ListRepository $listRepo, TaskRepository $taskRepo) {
        $this->fileRepo = $fileRepo;
        $this->departmentRepo = $departmentRepo;
        $this->userRepo = $userRepo;
        $this->listRepo = $listRepo;
        $this->taskRepo = $taskRepo;
    }

    public function index(Request $request){
        $input = $request->all();
        // $res = \DB::table('list')->where('list.project_id', $input['project_id'])->join('task','list.id','=','task.list_id')->select('task.id as id','task.created_at as dueDate','task.name as title', 'list.id as list_id','list.name as list_name')->where('task.parent_id', null)->get()->groupBy('list_id');
        $item = [];
        $res = \DB::table('list')->where('project_id', $input['project_id'])->orderBy('ordering','asc')->get();

        foreach($res as $key => $r){
            $res[$key]->title = $r->name;
            $res[$key]->id = strval($r->id);
            $item = \DB::table('task')->where('list_id', $r->id)->select('*','task.name as title')->get();
            foreach($item as $key_item => $it){
                if($it->status == 1){
                    $item[$key_item]->border = "primary";
                }elseif($it->status == 2){
                    $item[$key_item]->border = "danger";
                }
                elseif($it->status == 3){
                    $item[$key_item]->border = "success";
                }
                elseif($it->status == 4){
                    $item[$key_item]->border = "warning";
                }
                else{
                    $item[$key_item]->border = "secondary";
                }
                if($it->intended_end_time){
                $item[$key_item]->dueDate = date('d-m-Y', strtotime($it->intended_end_time));
                }
                $us = \DB::table('user_task')->where('task_id', $it->id)->get()->pluck('user_id');
                $item[$key_item]->users = \DB::table('user')->whereIn('id', $us)->get()->pluck('avatar');
               //dd($item[$key_item]->users);
            }
            $res[$key]->item = $item;
        }
       
        
        // foreach($res as $key => $r){
        //     $object = new \stdClass();
        //     $object->id = strval($key);
        //     $object->title = $r['0']->list_name;
        //     $object->item = $r;
        //     $item[] = $object;
        // }
        // dd($item);
        //dd($res);
        return $this->success($res);
    }

    public function create_board(Request $request)
    {  
        $input = $request->all();
        $count = $this->listRepo->countByForeignId($input['project_id'], "project_id");
        $input['ordering'] = $count + 1;
        $res = $this->listRepo->create($input);
        return $this->success($res);
    }

    public function create_card(Request $request)
    {  
        $input = $request->all();
        $count = $this->taskRepo->countByForeignId($input['list_id'], "list_id");
        $input['ordering'] = $count + 1;
        $res = $this->taskRepo->create($input);
        return $this->success($res);
    }

    public function card_detail(Request $request){
        $input = $request->all();
        $res = $this->taskRepo->find($input['card_id']);
        $res->user_id = UserTask::where('task_id', $input['card_id'])->pluck('user_id');
        $sub_task = Task::where('parent_id', $res->id)->get();
        foreach($sub_task as $key => $st){
            $sub_task[$key]->intended_start_time = str_replace(' ', 'T', $st->intended_start_time);
            $sub_task[$key]->intended_end_time = str_replace(' ', 'T', $st->intended_end_time);
        }
        $res->subtask = $sub_task;
        $res->intended_start_time = str_replace(' ', 'T', $res->intended_start_time);
        $res->intended_end_time = str_replace(' ', 'T', $res->intended_end_time);
        return $this->success($res);
    }

    public function checked(Request $request)
    {
        $input = $request->all();
        $res= Task::where('id', $input['task_id'])->update(['is_checked' => $input['checked']]);
        $parent_id = Task::where('id', $input['task_id'])->first()->parent_id;
        $tyle =  Task::where('parent_id', $parent_id)->where('is_checked' ,1)->count() / Task::where('parent_id', $parent_id)->count();
        $tyle = $tyle * 100;
        return $this->success($tyle);
    }

    
     public function arrange_board(Request $request)
    {
        $input = $request->all();
        foreach($input['arrange_board'] as $ar_board){
            \DB::table('list')->where('id', $ar_board['id'])->update(['ordering' => $ar_board['ordering']]);
        }
        return $this->success();
    }

    public function update_board(Request $request){
        $input = $request->all();
        $this->listRepo->update($input, $input['list_id']);
        return $this->success();
    }

}
