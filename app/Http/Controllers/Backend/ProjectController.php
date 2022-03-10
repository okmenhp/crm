<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\ProjectRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;

class ProjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ProjectRepository $projectRepo, EmployeeRepository $employeeRepo, DepartmentRepository $departmentRepo) {
        $this->projectRepo = $projectRepo;
        $this->employeeRepo = $employeeRepo;
        $this->departmentRepo = $departmentRepo;
    }

    public function index(Request $request)
    {
        $records = $this->projectRepo->readFE($request);
        $employee_array = $this->employeeRepo->all();
        $department_array = $this->departmentRepo->all();
        return view('backend/project/index', compact('records','employee_array','department_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_array = $this->employeeRepo->all();
        $department_array = $this->departmentRepo->all();
        return view('backend/project/create', compact('employee_array','department_array'));
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
        $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
        $input['end_date'] = date('Y-m-d', strtotime($input['end_date']));
        $input['department_id'] = implode(',', $input['department_id']);
        $validator = \Validator::make($input, $this->projectRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $res = $this->projectRepo->create($input);
        if($res){
            return redirect()->route('admin.project.index')->with('success', 'Thêm mới thành công');
        }
        else{
            return redirect()->route('admin.project.index')->with('error', 'Thêm mới thất bại');
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
    public function edit($id)
    {
        $record = $this->projectRepo->find($id);
        $record['department_id'] = explode(',', $record['department_id']);
        $employee_array = $this->employeeRepo->all();
        $department_array = $this->departmentRepo->all();
        return view('backend/project/edit', compact('employee_array','department_array','record'));
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
        $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
        $input['end_date'] = date('Y-m-d', strtotime($input['end_date']));
        $validator = \Validator::make($input, $this->projectRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $res = $this->projectRepo->update($input, $id);
        if($res){
            return redirect()->route('admin.project.index')->with('success', 'Cập nhật thành công');
        }
        else{
            return redirect()->route('admin.project.index')->with('error', 'Cập nhật thất bại');
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
        $this->projectRepo->delete($id);
        return redirect()->route('admin.project.index')->with('success', 'Xoá thành công');
    }
}