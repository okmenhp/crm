<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use App\Traits\UploadFile;

class EmployeeController extends BaseController
{
    use UploadFile;

    public function __construct(EmployeeRepository $employeeRepo, PositionRepository $positionRepo, DepartmentRepository $departmentRepo) {
        $this->employeeRepo = $employeeRepo;
        $this->positionRepo = $positionRepo;
        $this->departmentRepo = $departmentRepo;
    }

    public function index(Request $request)
    {
        $records = $this->employeeRepo->paginate($request ,10);
        return view('backend/employee/index', compact('records'));
    }

    public function create()
    {
        $option_department = $this->departmentRepo->all();
        $department_html = \App\Helpers\StringHelper::getSelectNameOptions($option_department);
        $option_position = $this->positionRepo->all();
        $position_html = \App\Helpers\StringHelper::getSelectNameOptions($option_position);
        return view('backend/employee/create', compact('department_html', 'position_html'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = \Validator::make($input, $this->employeeRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        if(isset($input['avatar'])){
            $input['avatar'] = $this->uploadImage($input['avatar']);
        }
        $res = $this->employeeRepo->create($input);
        if($res){
            return redirect()->route('admin.employee.index')->with('success', 'Thêm mới thành công');
        }
        else{
            return redirect()->route('admin.employee.index')->with('error', 'Thêm mới thất bại');
        }
    }

    public function edit(Request $request , $id)
    {
        $record = $this->employeeRepo->find($id);
        $option_department = $this->departmentRepo->all();
        $department_html = \App\Helpers\StringHelper::getSelectNameOptions($option_department, $record->department_id);
        $option_position = $this->positionRepo->all();
        $position_html = \App\Helpers\StringHelper::getSelectNameOptions($option_position, $record->position_id);
        return view('backend/employee/edit', compact('record','department_html','position_html'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = \Validator::make($input, $this->employeeRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        if(isset($input['avatar'])){
            $input['avatar'] = $this->uploadImage($input['avatar']);
        }
        $res = $this->employeeRepo->update($input, $id);
        if($res){
            return redirect()->route('admin.employee.index')->with('success', 'Cập nhật thành công');
        }
        else{
            return redirect()->route('admin.employee.index')->with('error', 'Cập nhật thất bại');
        }
    }

    public function destroy($id)
    {
        $this->employeeRepo->delete($id);
        return redirect()->route('admin.employee.index')->with('success', 'Xoá thành công');
    }
}