<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use 

class FileController extends BaseController
{
    public function index()
    {
        return view('backend/file/index');
    }

}
