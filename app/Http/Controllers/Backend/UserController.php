<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\UserRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use Auth;
use App\Traits\UploadFile;

class UserController extends BaseController
{
     
    use UploadFile;

    public function __construct(UserRepository $userRepo, PositionRepository $positionRepo, DepartmentRepository $departmentRepo) {
        $this->userRepo = $userRepo;
        $this->positionRepo = $positionRepo;
        $this->departmentRepo = $departmentRepo;
    }
   
    public function index()
    {
        $records = $this->userRepo->all()->where('id', '!=', Auth::user()->id);
        return view('backend/user/index', compact('records'));
    }

    public function create()
    {
        $option_department = $this->departmentRepo->all();
        $department_html = \App\Helpers\StringHelper::getSelectNameOptions($option_department);
        $option_position = $this->positionRepo->all();
        $position_html = \App\Helpers\StringHelper::getSelectNameOptions($option_position);
        return view('backend/user/create', compact('department_html', 'position_html'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = \Validator::make($input, $this->userRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['role_id'] = 1;
        if(isset($input['avatar'])){
            $input['avatar'] = $this->uploadImage($input['avatar']);
        }
        $input['password'] = bcrypt($input['password']);
        $res = $this->userRepo->create($input);
        if($res){
            return redirect()->route('admin.user.index')->with('success', 'Thêm mới thành công');
        }
        else{
            return redirect()->route('admin.user.index')->with('error', 'Thêm mới thất bại');
        }
    }
 
    public function edit($id)
    {
        $record = $this->userRepo->find($id);
        $option_department = $this->departmentRepo->all();
        $department_html = \App\Helpers\StringHelper::getSelectNameOptions($option_department, $record->department_id);
        $option_position = $this->positionRepo->all();
        $position_html = \App\Helpers\StringHelper::getSelectNameOptions($option_position, $record->position_id);
        return view('backend/user/edit', compact('record','department_html','position_html'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        if($input['password'] != null){
            $validator = \Validator::make($input, $this->userRepo->validateUpdateWithPassword($id));
            $input['password'] = bcrypt($input['password']);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }else{
            unset($input['password']);
            $validator = \Validator::make($input, $this->userRepo->validateUpdate($id));
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        if(isset($input['avatar'])){
            $input['avatar'] = $this->uploadImage($input['avatar']);
        }
        $res = $this->userRepo->update($input, $id);
        if($res){
            return redirect()->route('admin.user.index')->with('success', 'Cập nhật thành công');
        }
        else{
            return redirect()->route('admin.user.index')->with('error', 'Cập nhật thất bại');
        }
    }

    public function destroy($id)
    {
        //
    }
}