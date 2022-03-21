<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Task;
use App\Models\User;
use App\Traits\ApiResponse;
use Storage;
use App\Repositories\ProjectRepository;

class ProjectController extends BaseController
{
	use ApiResponse;

    public function __construct(ProjectRepository $projectRepo) {
        $this->projectRepo = $projectRepo;
    }

    public function index(Request $request){
        $input = $request->all();
        $records = $this->projectRepo->all();
        // $res = \DB::table('list')->where('list.project_id', $input['project_id'])->join('task','list.id','=','task.list_id')->get()->groupBy('list');
        return $this->success($records);
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

    public function gantt(){
        $tasks_all = Task::all();
        $users = User::all();
        $resources = array();
        $tasks = array();
        $dependencies = array();
        $resourceAssignments = array();
        foreach($users as $user){
            $resource['id'] = $user->id;
            $resource['text'] = $user->full_name;
            array_push($resources, $resource);
        }
        foreach($tasks_all as $key => $task){
            $sub_task['id'] = $task->id;
            $sub_task['parentId'] = $task->parent_id == null ? 0 : $task->parent_id;
            $sub_task['title'] = $task->name;
            $sub_task['start'] = ($task->intended_start_time == null && $task->parent_id != null) ? Task::find($task->parent_id)->intended_start_time : $task->intended_start_time;
            $sub_task['end'] = ($task->intended_end_time == null && $task->parent_id != null) ? Task::find($task->parent_id)->intended_end_time : $task->intended_end_time;
            $sub_task['progress'] = 0;
            // dd($sub_task);
            array_push($tasks, $sub_task);
            $dependency['id'] = $key;
            $dependency['predecessorId'] = $task->parent_id == null ? 0 : $task->parent_id;
            $dependency['successorId'] = $task->id;
            $dependency['type'] = 0;
            array_push($dependencies, $dependency);
            $resourceAssignment['id'] = $key;
            $resourceAssignment['taskId'] = $task->id;
            $resourceAssignment['resourceId'] = $task->manager_id == null ? 0 : $task->manager_id;
            array_push($resourceAssignments, $resourceAssignment);
        }

        return response()->json(['resources'=>$resources, 'tasks'=>$tasks, 'dependencies'=>$dependencies, 'resourceAssignments'=>$resourceAssignments]);
    }

}
