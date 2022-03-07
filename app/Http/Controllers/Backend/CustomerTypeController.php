<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CustomerTypeRepository;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(CustomerTypeRepository $customerTypeRepo)
    {
        $this->customerTypeRepo = $customerTypeRepo;
    }

    public function index(Request $request)
    {
        //
        $records = $this->customerTypeRepo->paginate($request, 10);
        return view('backend.customer_type.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.customer_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $messages = [
        //     'required' => 'Các trường có dấu (*) là bắt buộc nhập',
        //     'code.unique' => 'Mã loại đã tồn tại',
        //     'name.unique' => 'Tên loại đã tồn tại',
        // ];
        $input = $request->all();
        $validator = \Validator::make($input, $this->customerTypeRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $this->customerTypeRepo->create($input);
        return redirect()->route('admin.customer_type.index')->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $record = $this->customerTypeRepo->find($id);
        return view('backend/customer_type/edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $validator = \Validator::make($input, $this->customerTypeRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $this->customerTypeRepo->update($input, $id);
        return redirect()->route('admin.customer_type.index')->with('success', 'Cập nhật thành công');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $in_customer = \DB::table('customer')->where('type', $id)->first();
        if ($in_customer == null) {
            $this->customerTypeRepo->delete($id);
            return redirect()->back()->with('success', 'Xóa thành công');
        }
        return redirect()->back()->with('error', 'Không thể xoá vì bản ghi đang được liên kết với khách hàng');
    }
}
