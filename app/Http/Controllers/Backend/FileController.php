<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Repositories\FileRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;
use Auth;
use Illuminate\Support\Str;
use App\Models\File;

class FileController extends BaseController
{

    public function __construct(FileRepository $fileRepo, EmployeeRepository $employeeRepo, DepartmentRepository $departmentRepo, UserRepository $userRepo) {
        $this->fileRepo = $fileRepo;
        $this->employeeRepo = $employeeRepo;
        $this->departmentRepo = $departmentRepo;
        $this->userRepo = $userRepo;
    }

    public function index(Request $request, $uid)
    {   
        $uid_clone = $uid;
        $user_option = $this->userRepo->all()->where('id','!=', Auth::user()->id);
        $user_html = \App\Helpers\StringHelper::getSelectFullNameOptions($user_option);
        $department_option = $this->departmentRepo->all();
        $department_html = \App\Helpers\StringHelper::getSelectNameOptions($department_option);
        // $path = ( Storage::disk('public')->get('4074c9344515778cdd316325cea217cd.txt'));
        $path = "";
        if($uid == "0"){
            $records_folder = $this->fileRepo->listFile($request, '*', null)->where('type', 1);
            $records_file = $this->fileRepo->listFile($request, '*', null)->where('type', 2);
            $records_folder = $this->getMoreInfoFolder($records_folder);
            return view('backend/file/index', compact('uid','records_folder','records_file','department_html','user_html','path')); 
        }
        else{
            $records_folder = $this->fileRepo->getFileByUid($request, $uid)->where('type', 1);
            $records_file = $this->fileRepo->getFileByUid($request, $uid)->where('type', 2);
            $breadcumb = [];
            do {
                $record = File::where('uid', $uid_clone)->first();    //lấy link hiện tại
                $uid_clone = File::where('id', $record->parent_id)->pluck('uid')->first();   //check parent_id
                $breadcumb[$record->uid] =  $record->name;    //gán link vào tên folder
            }while ($uid_clone != null);
            $breadcumb = array_reverse($breadcumb);
            $records_folder = $this->getMoreInfoFolder($records_folder);
            
            return view('backend/file/index', compact('uid','records_folder','records_file','breadcumb','department_html','user_html','path')); 
        }     
    }

    public function viewFile(Request $request){
        
        $records = File::where('type', 2)->get();
        
        return response()->json(['data'=> $records]);
    }

    public function breadcumb($breadcumb, $uid){
        $record = File::where('uid', $uid)->first();
        array_push($breadcumb, $record->name);
        if($record->parent_id != null){
            $parent_uid = File::where('id', $record->parent_id)->first()->uid;
            $this->breadcumb($breadcumb, $parent_uid);
        }else{
            
        }    
    }

    public function getMoreInfoFolder($records_folder){
        foreach($records_folder as $key => $record_folder){
            $children = $this->fileRepo->getChildren($record_folder->id);
            $records_folder[$key]->size =  $children->sum('size');
            $records_folder[$key]->count =  $children->count();
        }
        return $records_folder;
    }

    public function createFolder(Request $request, $uid){
        $input['parent_id'] = $this->fileRepo->getParent($request, $uid);
        $input['name'] = $request->folder;
        $input['type'] = \App\Models\File::TYPE_FOLDER;
        $input['created_by'] = Auth::user()->id;
        $input['uid'] = Str::uuid();
        $input['share'] = 1;
        $input['status'] = 1;
        $this->fileRepo->create($input);
        return redirect()->route('admin.file.index', $uid);
    }
     
    public function openFolder(Request $request, $uid)
    {    
        return view('backend/folder/index');
    }

    public function upload(Request $request, $uid)
    {   
        $file = $request->file('file');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $path = Storage::disk('public')->put($fileName,file_get_contents($file));
        $input['parent_id'] = $this->fileRepo->getParent($request, $uid);
        $input['size'] = $file->getSize();
        $input['format'] = $file->extension();
        $input['link'] = $fileName;
        $input['name'] = $file->getClientOriginalName();
        $input['created_by'] = Auth::user()->id;
        $input['uid'] = Str::uuid();
        $input['type'] = \App\Models\File::TYPE_FILE;
        $input['share'] = 1;
        $input['status'] = 1;
        $this->fileRepo->create($input);
        return redirect()->route('admin.file.index', $uid);
    }

    public function restore(Request $request, $id) {
        $record = $this->fileRepo->find($id);
        if($record->status == 3){
            $record->update(['status' => 1]);
        }
        return redirect()->back();
    }

    public function share(Request $request, $id){
        $input = $request->all();
        if($input['share'] == 1){
            if($input['share_type'] == null){
                $input['share_type'] = 1;
            }
            if($input['share_type'] == 1){
                $input['share_for'] = implode(',', $input['user_id']);
            }
            elseif($input['share_type'] == 2){
               $input['share_for'] = implode(',', $input['department_id']);
            }
        }
        else{
            unset($input['share_type']);
        }
        unset($input['user_id']);
        unset($input['department_id']);
        //dd($input);
        $res = $this->fileRepo->update($input, $id);
        if($res){
            return redirect()->back()->with('success','Share thành công');
        }else{
            return redirect()->back()->with('error','Có lỗi trong quá trình xử lý');
        }
    }


    public function remove(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('backend/position/edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function dowload(Request $request, $id) {
        $link = $this->fileRepo->find($id)->link;
        return Storage::download('public/'.$link);
    }

    public function destroy($id)
    {
        $record = $this->fileRepo->find($id);
        if($record->status == 3){
            if($record->type == \App\Models\File::TYPE_FOLDER){
                $childrens = $this->fileRepo->getChildren($record->id);
                foreach($childrens as $child){
                    $child->delete();
                }
                $record->delete();
            }else{
                $record->delete();
            }
        }
        else{
            $record->update(['status' => 3]);
        }
        return redirect()->back();
    }
}
