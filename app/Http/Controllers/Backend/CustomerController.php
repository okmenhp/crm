<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerContactor;
use App\Repositories\CustomerContactorRepository;
use App\Repositories\CustomerTypeRepository;
use App\Repositories\CustomerRepository;

class CustomerController extends BaseController
{
    public function __construct(
        CustomerTypeRepository $customerTypeRepo,
        CustomerRepository $customerRepo,
        CustomerContactorRepository $customerContactorRepo,
    ) {
        $this->customerTypeRepo = $customerTypeRepo;
        $this->customerRepo = $customerRepo;
        $this->customerContactorRepo = $customerContactorRepo;
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
        $customer_contactor_array = $this->customerContactorRepo->getContactorByCustomerID($id);
        return view('backend/customer/edit', compact('record', 'customer_type_array', 'country_array', 'customer_contactor_array'));
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
        // return redirect()->route('admin.customer.edit')->with('success', 'Cập nhật thành công');
        return redirect()->back()->with('success', 'Cập nhật thành công');
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
        $customer = Customer::find($id);
        if ($customer) {
            try {
                \DB::beginTransaction();
                $this->customerContactorRepo->deleteWhere([
                    'customer_id' => $id
                ]);
                $this->customerRepo->delete($id);
                \DB::commit();
                // return redirect()->back()->with('success', 'Xóa thành công');
                return redirect()->route('admin.customer.index')->with('success', 'Xóa thành công');;
            } catch (\Exception $ex) {
                \DB::rollback();
                return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại');
            }
        } else {
            return redirect()->back()->with('error', 'Không tồn tại bản ghi');
        }
    }

    /**
     * update  customer note
     */
    public function addNote(Request $request, $id)
    {
        // $note = $request->input('note');
        // $validator = \Validator::make($input, $this->customerRepo->validateUpdate($id));
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // // $input['status'] = isset($input['status']) ? 1 : 0;
        // $this->customerRepo->update($input, $id);
        // // return redirect()->route('admin.customer.edit')->with('success', 'Cập nhật thành công');
        // return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function updateStatus(Request $request)
    {
        $status = $request->input('status');
        if ($status == Config::get('constants.STATUS.ACTIVE')) {
            $statusAfter = Config::get('constants.STATUS.INACTIVE');
        } else {
            $statusAfter = Config::get('constants.STATUS.ACTIVE');
        }
        try {
            DB::beginTransaction();
            $result = $this->user->update([
                "status" => $statusAfter
            ], $request->input('id'));
            if ($result->status == Config::get('constants.STATUS.INACTIVE') && $result->access_token != '') {
                try {
                    JWTAuth::setToken($result->access_token)->invalidate();
                } catch (\Exception/*\Tymon\JWTAuth\Exceptions\TokenBlacklistedException*/ $e) {
                }
            }
            DB::commit();
            return response()->json(['data' => $result, 'error' => false]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => ""]);
        }
    }
}
