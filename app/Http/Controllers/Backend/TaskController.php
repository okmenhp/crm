<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Project;
use App\Repositories\TaskRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserTaskRepository;
use App\Repositories\UserRepository;
use App\Models\Task;
use App\Models\User;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(TaskRepository $taskRepo, EmployeeRepository $employeeRepo, DepartmentRepository $departmentRepo, ProjectRepository $projectRepo, UserTaskRepository $usertaskRepo, UserRepository $userRepo) {
        $this->taskRepo = $taskRepo;
        $this->employeeRepo = $employeeRepo;
        $this->departmentRepo = $departmentRepo;
        $this->projectRepo = $projectRepo;
        $this->usertaskRepo = $usertaskRepo;
        $this->userRepo = $userRepo;
    }

    public function index(Request $request)
    {
        $records = $this->taskRepo->readFE($request);
        $usertask_array = $this->usertaskRepo->all();
        $employee_array = $this->employeeRepo->all();
        $department_array = $this->departmentRepo->all();
        return view('backend/task/index', compact('records','employee_array','department_array','usertask_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_array = $this->userRepo->all();
        $project_array = $this->projectRepo->all();
        $task_array = $this->taskRepo->all();
        return view('backend/task/create', compact('user_array','project_array','task_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['intended_start_time'] = date('Y-m-d H:i:s', strtotime($input['intended_start_time']));
        $input['intended_end_time'] = date('Y-m-d H:i:s', strtotime($input['intended_end_time']));
        // $input['user_id'] = implode(',', $input['user_id']);
        $validator = \Validator::make($input, $this->taskRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Them vao bang task

        $res = $this->taskRepo->create($input);
        //Them quan he
        $res->User()->attach($input['user_id']);

        if($res){
            return redirect()->route('admin.task.index')->with('success', 'Thêm mới thành công');
        }
        else{
            return redirect()->route('admin.task.index')->with('error', 'Thêm mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_array = $this->userRepo->all();
        $project_array = $this->projectRepo->all();
        $task_array = $this->taskRepo->all();
        return view('backend/task/edit', compact('user_array','project_array','task_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->taskRepo->delete($id);
        return redirect()->route('admin.task.index')->with('success', 'Xoá thành công');
    }

    public function gantt(Request $request){
        $id = $request->id;
        return view('backend/project/gantt', compact('id'));
    }
}