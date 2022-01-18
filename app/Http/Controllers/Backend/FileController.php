<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class FileController extends BaseController
{

    public function index()
    {
        return view('backend/file/index');
    }

    public function create()
    {
        return view('backend/position/create');
    }

    public function upload(Request $request)
    {
        
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
