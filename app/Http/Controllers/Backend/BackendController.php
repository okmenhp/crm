<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\UserRepository;

class BackendController extends BaseController
{

    public function __construct(UserRepository $userRepo){
    	$this->userRepo = $userRepo;
    }

    public function index()
    {
        $data = $this->userRepo->all();
        dd($this->test());
        return view('index');
    }
}