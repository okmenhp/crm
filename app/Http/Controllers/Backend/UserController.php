<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\UserRepository;

class UserController extends BaseController
{

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }
   
    public function index()
    {
        $records = $this->userRepo->all();
        return view('backend/user/index', compact('records'));
    }

    public function create()
    {
        return view('backend/user/create');
    }

    public function store(Request $request)
    {
        //
    }
 
    public function edit()
    {
        return view('backend/employee/edit');
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