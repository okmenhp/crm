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
        $this->usertaskRepo = $usertaskRepo;
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
        $input = $request->all();
        $input['date'] = date('Y-m-d H:i:s', strtotime($input['date']));
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
