<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\ListRepository;


class KanbanController extends BaseController
{
	public function __construct(ListRepository $listRepo) {
        $this->listRepo = $listRepo;
    }

    public function index($project_id)
    {
        $records = $this->listRepo->all()->where('project_id',$project_id);
        return view('backend/kanban/index', compact('records','project_id'));
    }
}