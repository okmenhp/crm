<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CustomerType;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerContactorRepository;
use App\Repositories\CustomerTypeRepository;
use Carbon\Carbon;
use App\Helpers\CommonFunctions;
use App\Models\CustomerContactor;

class CustomerContactorController extends Controller
{
    public function __construct(
        CustomerRepository $customerRepo,
        CustomerTypeRepository $customerTypeRepo,
        CustomerContactorRepository $customerContactorRepo,
    ) {
        $this->customerRepo = $customerRepo;
        $this->customerTypeRepo = $customerTypeRepo;
        $this->customerContactorRepo = $customerContactorRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $customer_type_array = $this->customerTypeRepo->all();
        // $country_array = Country::orderBy('country_name', 'ASC')->get();
        // return view('backend/customer/create', compact('customer_type_array', 'country_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $customer_id)
    {
        // //
        $input = $request->all();
        $validator = \Validator::make($input, $this->customerContactorRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['customer_id'] = $customer_id;
        $res = $this->customerContactorRepo->create($input);
        if ($res) {
            return redirect()->back()->with('success', 'Thêm người liên lạc thành công');
            // // return redirect()->route('admin.customer.index')->with('success', 'Thêm mới thành công');
            // return redirect()->route('admin.customer.edit', $customer_id)->with('error', 'Thêm mới thành công');
        } else {
            // return redirect()->route('admin.customer.edit', $customer_id)->with('error', 'Thêm mới thất bại');
            return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại');
        }
        // $apiFormat = [];
        // $apiFormat['status'] = \Config::get('constants.STATUS.INACTIVE');
        // $input = $request->all();
        // dd($input);
        // $validator = \Validator::make($input, $this->customerContactorRepo->validateCreate());
        // if ($validator->fails()) {
        //     $apiFormat['message'] = $validator->errors()->first();
        //     return response()->json($apiFormat);
        // }
        // $dataSave = [
        //     'name'             => $request->input('name'),
        //     'customer_type_id' => $request->input('customer_type_id'),
        //     'position'         => $request->input('position'),
        //     'gender'           => $request->has('gender'),
        //     'date_of_birth'    => $request->date_of_birth ? Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('mm/dd/YYYY') : null,
        //     'id_card'          => $request->input('id_card'),
        //     'phone_number'     => $request->input('phone_number'),
        //     'email'            => $request->input('email'),
        //     'skype'            => $request->input('skype'),
        //     'zalo'             => $request->input('zalo'),
        //     'wechat'           => $request->input('wechat'),
        //     'whatsapp'         => $request->input('whatsapp'),
        //     'address'          => $request->input('address'),
        //     'country_id'       => $request->input('country_id'),
        //     'note'             => $request->input('note'),
        //     'customer_id'      => $customer_id,
        // ];
        // try {
        //     DB::beginTransaction();
        //     $result = $this->customerContactorRepo->create($dataSave);
        //     dd($result);
        //     DB::commit();
        //     $apiFormat['status']    = \Config::get('constants.STATUS.ACTIVE');
        //     $apiFormat['message']   = 'Thêm mới thành công';
        // } catch (\Exception $e) {
        //     $apiFormat['message'] = $e->getMessage();
        //     DB::rollBack();
        // }
        // return response()->json($apiFormat);
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
        $apiFormat = [];
        $apiFormat['status'] = \Config::get('constants.STATUS.INACTIVE');
        if ($this->customerContactorRepo->countWhere(['id' => $id]) > 0) {
            $apiFormat['status'] = \Config::get('constants.STATUS.ACTIVE');
            $apiFormat['data']  = $this->customerContactorRepo->firstWhere(['id' => $id], ['*']);
        } else {
            $apiFormat['message'] = 'Không tồn tại bản ghi';
        }
        return response()->json($apiFormat);
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
        $apiFormat = [];
        $apiFormat['status'] = \Config::get('constants.STATUS.INACTIVE');
        $input = $request->all();
        $validator = \Validator::make($input, $this->customerContactorRepo->validateUpdate($id));
        if ($validator->fails()) {
            $apiFormat['message'] = $validator->errors()->first();
            return response()->json($apiFormat);
        }
        $dataUpdate = [
            'name'             => $request->input('name'),
            'customer_type_id' => $request->input('customer_type_id'),
            'position'         => $request->input('position'),
            'gender'           => $request->has('gender'),
            'date_of_birth'    => $request->date_of_birth ? Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('mm/dd/YYYY') : null,
            'id_card'          => $request->input('id_card'),
            'phone_number'     => $request->input('phone_number'),
            'email'            => $request->input('email'),
            'skype'            => $request->input('skype'),
            'zalo'             => $request->input('zalo'),
            'wechat'           => $request->input('wechat'),
            'whatsapp'         => $request->input('whatsapp'),
            'address'          => $request->input('address'),
            'country_id'       => $request->input('country_id'),
            'note'             => $request->input('note'),
            'customer_id'      => $request->customer_id,
        ];
        try {
            DB::beginTransaction();
            $post = $this->customerContactorRepo->update($dataUpdate, $request->id);
            $apiFormat['status'] = \Config::get('constants.STATUS.ACTIVE');
            $apiFormat['message'] = 'Cập nhật thành công';
            DB::commit();
        } catch (\Exception $e) {
            $apiFormat['message'] = 'Có lỗi xảy ra';
            DB::rollBack();
        }
        return response()->json($apiFormat);
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
        $jsonFormat = [];
        $jsonFormat['status'] = \Config::get('constants.STATUS.INACTIVE');
        $contactor = CustomerContactor::find($id);
        if ($contactor) {
            try {
                DB::beginTransaction();
                $this->customerContactorRepo->delete($contactor->id);
                DB::commit();
                $jsonFormat['status'] = \Config::get('constants.STATUS.ACTIVE');
                $jsonFormat['message'] = 'Xóa thành công 1 bản ghi';
                return response()->json($jsonFormat);
            } catch (\Exception $ex) {
                DB::rollBack();
                $jsonFormat['message'] =  $ex->getMessage();
                return response()->json($jsonFormat);
            }
        } else {
            $jsonFormat['message'] = 'Không tồn tại bản ghi';
            return response()->json($jsonFormat);
        }
    }

    /**
     * get customer contactor
     */
    public function getContactor($id)
    {
        $apiFormat = [];
        $apiFormat['status'] = \Config::get('constants.STATUS.INACTIVE');
        if ($this->customerContactorRepo->countWhere(['id' => $id]) > 0) {
            $apiFormat['status'] = \Config::get('constants.STATUS.ACTIVE');
            $apiFormat['data']  = $this->news->firstWhere(['id' => $id], ['*']);
        } else {
            $apiFormat['message'] = 'Không tồn tại bản ghi';
        }
        return response()->json($apiFormat);
    }

    /**
     *  datatable customer contactor
     */

    public function contactorDatatable(Request $request)
    {
        $contactors = $this->customerContactorRepo->findAllContactor();
        dd($contactors);
        $data = [];
        if (!empty($contactors['data'])) {
            foreach ($contactors['data'] as $index => $row) {
                $urlEdit = "admin.customer_contactor.edit";
                $urlDelete = "admin.customer_contactor.destroy";
                $nestedData['index'] = ++$index;
                $nestedData['name'] = $row->name ? $row->name : '';
                $nestedData['customer_type_id'] = $row->customer_type_id ? CustomerType::find($row->customer_type_id)->name : '';
                $nestedData['name'] = $row->position ? $row->position : '';
                $nestedData['gender'] = $row->gender == 1 ? 'Nam' : 'Nữ';
                $nestedData['date_of_birth'] = $row->date_of_birth ? Carbon::parse($row->date_of_birth)->format('d/m/Y') : '';
                $nestedData['id_card'] = $row->id_card ? $row->id_card : '';
                $nestedData['phone_number'] = $row->phone_number ? $row->phone_number : '';
                $nestedData['email'] = $row->email ? $row->email : '';
                $nestedData['skype'] = $row->skype ? $row->skype : '';
                $nestedData['zalo'] = $row->zalo ? $row->zalo : '';
                $nestedData['wechat'] = $row->wechat ? $row->wechat : '';
                $nestedData['whatsapp'] = $row->whatsapp ? $row->whatsapp : '';
                $nestedData['address'] = $row->address ? $row->address : '';
                $nestedData['country_id'] = $row->country_id ? Country::find($row->country_id)->name : '';
                $nestedData['note'] = $row->note ? $row->note : '';
                $nestedData['customer_id'] = $row->customer_id ? $row->customer_id : '';
                $nestedData['create_at'] = $row->created_at ? Carbon::parse($row->created_at)->format('d-m-Y') : "--";
                $nestedData['options'] = CommonFunctions::getHtmlEditAndDelete($row->id, $urlEdit, $urlDelete, 'PUT', 'POST', $row->name);
                $data[] = $nestedData;
            }
        }
        $result = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($contactors['recordsTotal']),
            "data"            => $data
        ];
        return response()->json($result);
    }
}
