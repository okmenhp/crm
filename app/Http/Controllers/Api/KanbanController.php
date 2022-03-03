<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Traits\ApiResponse;
use Storage;
use App\Repositories\FileRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\UserRepository;
use App\Repositories\ListRepository;
use App\Repositories\TaskRepository;

class KanbanController extends BaseController
{
	use ApiResponse;

    public function __construct(FileRepository $fileRepo, DepartmentRepository $departmentRepo, UserRepository $userRepo, ListRepository $listRepo, TaskRepository $taskRepo) {
        $this->fileRepo = $fileRepo;
        $this->departmentRepo = $departmentRepo;
        $this->userRepo = $userRepo;
        $this->listRepo = $listRepo;
        $this->taskRepo = $taskRepo;
    }


    public function create_board(Request $request)
    {  
        $input = $request->all();
        $count = $this->taskRepo->countByForeignId($input['project_id'], "project_id");
        dd($count);
        return view('backend/file/index');
    }

}
