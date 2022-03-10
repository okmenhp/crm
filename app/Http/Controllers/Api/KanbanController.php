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
        $res = \DB::table('list')->where('list.project_id', $input['project_id'])->join('task','list.id','=','task.list_id')->select('task.id as id','task.created_at as dueDate','task.name as title', 'list.id as list_id','list.name as list_name')->where('task.parent_id', null)->get()->groupBy('list_id');
        $item = [];
        
        foreach($res as $key => $r){
            $object = new \stdClass();
            $object->id = strval($key);
            $object->title = $r['0']->list_name;
            $object->item = $r;
            $item[] = $object;
        }
        return $this->success($item);
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
        $res->user_id = $res->User();
        $res->subtask = Task::where('parent_id', $res->id)->get();
        return $this->success($res);
    }

}
