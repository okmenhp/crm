<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Project;
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
        $projects = Project::all();
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
        foreach($projects as $key => $project){
            $sub_task['id'] = $project->id;
            $sub_task['parentId'] = null;
            $sub_task['title'] = $project->name;
            $sub_task['start'] = $project->start_date;
            $sub_task['end'] = $project->end_date;
            $sub_task['progress'] = 0;
            array_push($tasks, $sub_task);
            $resourceAssignment['id'] = $key;
            $resourceAssignment['taskId'] = $project->id;
            $resourceAssignment['resourceId'] = $project->member_id == null ? 0 : $project->member_id;
            array_push($resourceAssignments, $resourceAssignment);
        }
        foreach($tasks_all as $key => $task){
            if($task->intended_start_time == null && $task->parent_id != null){
                $sub_task['start'] = Task::find($task->parent_id)->intended_start_time;
                $sub_task['end'] =  Task::find($task->parent_id)->intended_end_time;
            }else if($task->intended_start_time == null && $task->parent_id == null){
                $sub_task['start'] = Project::find($task->project_id)->start_date;
                $sub_task['end'] =  Project::find($task->project_id)->end_date;
            }else{
                $sub_task['start'] = $task->intended_start_time;
                $sub_task['end'] =  $task->intended_end_time;
            }
            $sub_task['id'] = "t".$task->id;
            $sub_task['parentId'] = $task->parent_id == null ? $task->project_id : "t".$task->parent_id;
            $sub_task['title'] = $task->name;
            $sub_task['progress'] = 0;
            array_push($tasks, $sub_task);
            $dependency['id'] = $key;
            $dependency['predecessorId'] = $task->parent_id == null ? $task->project_id : "t".$task->parent_id;
            $dependency['successorId'] = "t".$task->id;
            $dependency['type'] = 0;
            array_push($dependencies, $dependency);
            $resourceAssignment['id'] = "1".$task->id;
            $resourceAssignment['taskId'] = "t".$task->id;
            $resourceAssignment['resourceId'] = $task->manager_id == null ? 0 : $task->manager_id;
            array_push($resourceAssignments, $resourceAssignment);
        }

        return response()->json(['resources'=>$resources, 'tasks'=>$tasks, 'dependencies'=>$dependencies, 'resourceAssignments'=>$resourceAssignments]);
    }

    public function ganttUpdate(Request $request){
        if($request->type_time == 1){
            if($request->key[0] == "t"){
                $task = Task::find($request->key[1]);
                $task['intended_start_time'] = $request->start;
                $task->save();
            }else{
                $task = Project::find($request->key[0]);
                $task['start_date'] = $request->start;
                $task->save();
            }
            return response()->json(['key'=> $request->key, 'type_time'=> $request->type_time, 'start'=>$request->start_default]);
        }elseif($request->type_time == 2){
            if($request->key[0] == "t"){
                $task = Task::find($request->key[1]);
                $task['intended_end_time'] = $request->end;
                $task->save();
            }else{
                $task = Project::find($request->key[0]);
                $task['end_date'] = $request->end;
                $task->save();
            }
            return response()->json(['key'=> $request->key, 'type_time'=> $request->type_time, 'end'=>$request->end_default]);
        }else{
            return response()->json(['type_time'=> $request->type_time,]);
        }
        
    }

}
