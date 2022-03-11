<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\TaskRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserTaskRepository;
use App\Models\Task;
use App\Models\User;
use App\Traits\UploadFile;

class TaskKanbanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UploadFile;

    public function __construct(TaskRepository $taskRepo, EmployeeRepository $employeeRepo, DepartmentRepository $departmentRepo, ProjectRepository $projectRepo, UserTaskRepository $usertaskRepo) {
        $this->taskRepo = $taskRepo;
        $this->employeeRepo = $employeeRepo;
        $this->departmentRepo = $departmentRepo;
        $this->projectRepo = $projectRepo;
        $this->usertaskRepo = $usertaskRepo;
    }

    public function store($subtask, $list_id, $task_id)
    {  
        Task::where('parent_id', $task_id)->delete();
        foreach($subtask as $st){
            $input['name'] = $st;
            $input['list_id'] = $list_id;
            $input['parent_id'] = $task_id;
            $this->taskRepo->create($input);
        }
    }

    
    public function edit()
    {
        return view('backend/department/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        //$validator = \Validator::make($input, $this->taskRepo->validateCreate());
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        $res = $this->taskRepo->update($input, $input['card_id']);
        $res = $this->taskRepo->find($input['card_id']);
        $id = $input['card_id'];
        if(isset($input['subtask'])){
        $this->store($input['subtask'], $input['list_id'], $input['card_id']);
        }
        //Them quan he
        $res->User()->sync($input['user_id']);
        if($res){
            return redirect()->route('admin.kanban.index', $input['project_id'])->with('success', 'Cập nhật thành công');
        }
        else{
            return redirect()->route('admin.kanban.index', $input['project_id'])->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
