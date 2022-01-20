<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Repositories\FileRepository;
use Auth;
use Illuminate\Support\Str;

class FileController extends BaseController
{

    public function __construct(FileRepository $fileRepo) {
        $this->fileRepo = $fileRepo;
    }

    public function index(Request $request, $uid)
    {   
        if($uid == "0"){
            $records_folder = $this->fileRepo->allParent('*', null)->where('type', 1);
            $records_file = $this->fileRepo->allParent('*', null)->where('type', 2);
        }
        else{
            $records_folder = $this->fileRepo->getFileByUid($uid)->where('type', 1);
            $records_file = $this->fileRepo->getFileByUid($uid)->where('type', 2);
        }
        $records_folder = $this->getMoreInfoFolder($records_folder);
        return view('backend/file/index', compact('uid','records_folder','records_file'));
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
        $input['is_share'] = 0;
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
        $input['is_share'] = 0;
        $input['status'] = 1;
        $this->fileRepo->create($input);
        return redirect()->route('admin.file.index', $uid);
    }

    public function breadcumb($id, $parent_id){
        
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
            }
        }
        else{
            $record->update(['status' => 3]);
        }
        return redirect()->back();
    }
}
