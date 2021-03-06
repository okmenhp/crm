<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Position;
use Validator;
use App\Repositories\PositionRepository;

class PositionController extends BaseController
{
    public function __construct(PositionRepository $positionRepo) {
        $this->positionRepo = $positionRepo;
    }

    public function index(Request $request)
    {
        $records = $this->positionRepo->paginate($request ,10);
        return view('backend/position/index',compact('records'));
    }

    public function create()
    {   
        return view('backend/position/create');
    }

    //Use Reposiotry
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = \Validator::make($input, $this->positionRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $this->positionRepo->create($input);
        return redirect()->route('admin.position.index')->with('success','Thêm mới thành công');;
    }
    
    // Use model
    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $validator = Validator::make($input, [
    //         'name' => 'required|unique:position'
    //     ]);

    //     if ($validator->fails()) {
    //         dd($validator->errors());
    //     }
    //     Position::create($input);
    //     return redirect()->route('admin.position.index');
    // }

    
    public function edit($id)
    {
        $record = $this->positionRepo->find($id);
        return view('backend/position/edit', compact('record'));
    }

    //Use Reposiotry
    public function update(Request $request, $id)
    { 
        $input = $request->all();
        $validator = \Validator::make($input, $this->positionRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $this->positionRepo->update($input, $id);
        return redirect()->route('admin.position.index')->with('success','Cập nhật thành công');;
    }
    
    // Use Model
    // public function update(Request $request, $id)
    // {
    //     $input = $request->all();
    //     $validator = Validator::make($input, [
    //         'name' => 'required|unique:position,unique:position,name,' . $id . ',id'
    //     ]);


    //     if ($validator->fails()) {
    //         return redirect()->route('admin.position.edit', $id)->withErrors($validator);
    //     }
    //     Position::where('id', $id)->update($input);
    //     return redirect()->route('admin.position.index');
    // }

    public function destroy($id)
    {
        $in_employee = \DB::table('employee')->where('position_id', $id)->first();
        if($in_employee == null){
        $this->positionRepo->delete($id);
        return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Không thể xoá vì bản ghi đang được liên kết với nhân viên'); 
    }
}
