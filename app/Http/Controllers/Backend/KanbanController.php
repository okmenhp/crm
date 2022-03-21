<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\ListRepository;
use App\Repositories\UserRepository;

class KanbanController extends BaseController
{
	public function __construct(ListRepository $listRepo, UserRepository $userRepo) {
        $this->listRepo = $listRepo;
        $this->userRepo = $userRepo;
    }

    public function index($project_id)
    {
        $records = $this->listRepo->all()->where('project_id',$project_id);
        $user_option = $this->userRepo->all();
        $user_html = \App\Helpers\StringHelper::getSelectFullNameOptions($user_option);
        return view('backend/kanban/index', compact('records','project_id','user_html','user_option'));
    }

  
}