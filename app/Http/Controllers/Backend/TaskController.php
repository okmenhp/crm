<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\TaskRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserTaskRepository;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(TaskRepository $taskRepo, EmployeeRepository $employeeRepo, DepartmentRepository $departmentRepo, ProjectRepository $projectRepo, UserTaskRepository $usertaskRepo) {
        $this->taskRepo = $taskRepo;
        $this->employeeRepo = $employeeRepo;
        $this->departmentRepo = $departmentRepo;
        $this->projectRepo = $projectRepo;
    }

    public function index(Request $request)
    {
        $records = $this->taskRepo->readFE($request);
        $employee_array = $this->employeeRepo->all();
        $department_array = $this->departmentRepo->all();
        return view('backend/task/index', compact('records','employee_array','department_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_array = $this->employeeRepo->all();
        $project_array = $this->projectRepo->all();
        return view('backend/task/create', compact('employee_array','project_array'));
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
        $input['date'] = date('Y-m-d H:i:s', strtotime($input['date']));
        $input['user_id'] = implode(',', $input['user_id']);
        $validator = \Validator::make($input, $this->taskRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $res = $this->taskRepo->create($input);

        // $res = $this->usertaskRepo->create($input);

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
        return view('backend/department/edit');
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
        //
    }
}
