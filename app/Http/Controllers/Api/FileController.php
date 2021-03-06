<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Traits\ApiResponse;
use Storage;
use App\Repositories\FileRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;

class FileController extends BaseController
{
	use ApiResponse;

      public function __construct(FileRepository $fileRepo, EmployeeRepository $employeeRepo, DepartmentRepository $departmentRepo, UserRepository $userRepo) {
        $this->fileRepo = $fileRepo;
        $this->employeeRepo = $employeeRepo;
        $this->departmentRepo = $departmentRepo;
        $this->userRepo = $userRepo;
    }


    public function index()
    {  
        return view('backend/file/index');
    }

    public function property(Request $request){
    	$id = $request->id;
        $record = $this->fileRepo->find($id);
        if($record != null){
            return $this->success($record);
	    }else{
	    	return $this->error();
	    }
    }

    public function rename(Request $request){
    	$id = $request->id;
    	$name = $request->name;
    	$record = $this->fileRepo->find($id);
    	if($record){
    		$record->update(['name' => $name]);
    		return $this->success();
    	}else{
    		return $this->error();
    	}
    }

    public function dowload(Request $request){
    	$id = $request->id;
    	$link = $this->fileRepo->find($id)->link;
    	return Storage::download('public/'.$link);
    }

    public function load_share_for(Request $request, $id){
        $record = $this->fileRepo->find($id);
        $user_option = $this->userRepo->all()->where('id','!=', \Auth::user()->id);
        $user_html = \App\Helpers\StringHelper::getSelectFullNameOptions($user_option, explode(',',$record->share_for));
        $department_option = $this->departmentRepo->all();
        $department_html = \App\Helpers\StringHelper::getSelectNameOptions($department_option, explode(',',$record->share_for));
        return response()->json(['success' => 1 , 'user_html' => $user_html, 'department_html' => $department_html ,'share_type' => $record->share_type]);
    }

    public function info(Request $request, $id){
        $record = $this->fileRepo->find($id);
        $record['file_own'] = $record->createdBy->full_name;
        if($record){
            return $this->success($record);
        }else{
            return $this->error();
        }
    }
}
