<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Traits\ApiResponse;
use Storage;
use App\Repositories\TaskRepository;

class TaskController extends BaseController
{
	use ApiResponse;

    public function __construct(ProjectRepository $projectRepo) {
        $this->projectRepo = $projectRepo;
    }

    public function index(Request $request){
        $input = $request->all();
        $records = $this->projectRepo->all();
        // $res = \DB::table('list')->where('list.project_id', $input['project_id'])->join('task','list.id','=','task.list_id')->get()->groupBy('list');
        return $this->success($records);
    }


    public function create_board(Request $request)
    {
        $input = $request->all();
        $count = $this->listRepo->countByForeignId($input['project_id'], "project_id");
        $input['ordering'] = $count + 1;
        $res = $this->listRepo->create($input);
        return $this->success($res);
    }

    public function create_card(Request $request)
    {
        $input = $request->all();
        $count = $this->taskRepo->countByForeignId($input['list_id'], "list_id");
        $input['ordering'] = $count + 1;
        $res = $this->taskRepo->create($input);
        return $this->success($res);
    }

}
