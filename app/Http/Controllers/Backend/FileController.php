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

    public function index($uid)
    {  
        return view('backend/file/index', compact('uid'));
    }

    public function createFolder(Request $request, $uid){
        dd(Auth::user());
        $input['parent_id'] = $this->fileRepo->getParent($request, $uid);
        $input['type'] = \App\Models\File::TYPE_FOLDER;
        $input['created_by'] = Auth::user()->id;
        $input['uid'] = Str::uuid();
        $input['is_share'] = 0;
        $input['status'] = 1;
        $this->fileRepo->create($input);
        return redirect()->route('admin.file.index', $uid);
    }

    public function create()
    {
        return view('backend/position/create');
    }

    public function upload(Request $request)
    {   
        $file = $request->file('file');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $path = Storage::disk('local')->put($fileName,file_get_contents($file));
        $input['size'] = $file->getSize();
        $input['format'] = $file->extension();
        $input['link'] = $path;
        $input['name'] = $file;
        $input['created_by'] = Auth::user()->id;
        $input['uid'] = Str::uuid();
        $input['type'] = \App\Models\File::TYPE_FOLDER;
        $input['is_share'] = 0;
         $input['status'] = 1;
        $this->fileRepo->create($input);
  
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
        //
    }
}
