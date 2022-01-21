<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\FileRepository;
use App\Traits\ApiResponse;
use Storage;

class FileController extends BaseController
{
	use ApiResponse;
	public function __construct(FileRepository $fileRepo){
        $this->fileRepo = $fileRepo;
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
}
