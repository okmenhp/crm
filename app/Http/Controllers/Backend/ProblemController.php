<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Problem;
use App\Models\Department;
use Validator;
use App\Repositories\ProblemRepository;
use App\Repositories\DepartmentRepository;

class ProblemController extends BaseController
{
    public function __construct(ProblemRepository $problemRepo, DepartmentRepository $departmentRepo) {
        $this->problemRepo = $problemRepo;
        $this->departmentRepo = $departmentRepo;
    }

    public function index(Request $request)
    {
        $department_array = $this->departmentRepo->all();
        $records = $this->problemRepo->readFE($request);
        return view('backend/problem/index',compact('records','department_array'));
    }

    public function create()
    {
        $department_array = $this->departmentRepo->all();
        return view('backend/problem/create',compact('department_array'));
    }

    //Use Reposiotry
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = \Validator::make($input, $this->departmentRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $this->departmentRepo->create($input);
        return redirect()->route('admin.department.index')->with('success','Thêm mới thành công');;
    }

    public function edit($id)
    {
        $record = $this->departmentRepo->find($id);
        $department_array = $this->departmentRepo->all();
        return view('backend/department/edit', compact('record','department_array'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = \Validator::make($input, $this->departmentRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $this->departmentRepo->update($input, $id);
        return redirect()->route('admin.department.index')->with('success','Cập nhật thành công');;
    }

    public function destroy($id)
    {
        $in_employee = \DB::table('employee')->where('department_id', $id)->first();
        if($in_employee == null){
        $this->departmentRepo->delete($id);
        return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Không thể xoá vì bản ghi đang được liên kết với nhân viên');
    }
}
