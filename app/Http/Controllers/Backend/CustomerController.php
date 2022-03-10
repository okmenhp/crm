<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerContactor;
use App\Repositories\CustomerTypeRepository;
use App\Repositories\CustomerRepository;

class CustomerController extends BaseController
{
    public function __construct(
        CustomerTypeRepository $customerTypeRepo,
        CustomerRepository $customerRepo,
    ) {
        $this->customerTypeRepo = $customerTypeRepo;
        $this->customerRepo = $customerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $customer_type_array = $this->customerTypeRepo->all();
        $records = $this->customerRepo->paginate($request, 10);
        // $records = Customer::with('customer_types', 'countries')->orderBy('id', 'DESC')->paginate(10);
        return view('backend/customer/index', compact('records', 'customer_type_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customer_type_array = $this->customerTypeRepo->all();
        $country_array = Country::orderBy('country_name', 'ASC')->get();
        return view('backend/customer/create', compact('customer_type_array', 'country_array'));
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
        $input = $request->all();
        $validator = \Validator::make($input, $this->customerRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = 0;
        $res = $this->customerRepo->create($input);
        if ($res) {
            return redirect()->route('admin.customer.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('admin.customer.index')->with('error', 'Thêm mới thất bại');
        }
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
        $customer_type_array = $this->customerTypeRepo->all();
        $country_array = Country::orderBy('country_name', 'ASC')->get();
        $record = $this->customerRepo->find($id);
        // dd($record);
        return view('backend/customer/detail', compact('record', 'customer_type_array', 'country_array'));
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
        $record = $this->customerRepo->find($id);
        $customer_type_array = $this->customerTypeRepo->all();
        $country_array = Country::orderBy('country_name', 'ASC')->get();
        return view('backend/customer/edit', compact('record', 'customer_type_array', 'country_array'));
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
        $validator = \Validator::make($input, $this->customerRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $input['status'] = isset($input['status']) ? 1 : 0;
        $this->customerRepo->update($input, $id);
        return redirect()->route('admin.customer.edit')->with('success', 'Cập nhật thành công');;
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
        // $customer_contactors = CustomerContactor::where('customer_id', $id)->delete();

        // $customer = Customer::findOrFail($id);
        // $customer->delete();
        // $in_customer = \DB::table('customer')->where('customer_type_id', $id)->first();
        // if ($in_customer == null) {
        //     $this->customerTypeRepo->delete($id);
        //     return redirect()->back()->with('success', 'Xóa thành công');
        // }
        // return redirect()->back()->with('error', 'Không thể xoá vì bản ghi đang được liên kết với khách hàng');
    }
}
