<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class KanbanController extends BaseController
{

    public function index()
    {
        return view('backend/kanban/index');
    }
}