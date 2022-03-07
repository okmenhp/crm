<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Department;
use App\Models\Customer;
use App\Repositories\DepartmentRepository;
use App\Repositories\CustomerRepository;

class CustomerController extends BaseController
{

    public function __construct(DepartmentRepository $departmentRepo, CustomerRepository $customerRepo) {
        $this->departmentRepo = $departmentRepo;
        $this->customerRepo = $customerRepo;
    }

    public function index()
    {
        $department_array = $this->departmentRepo->all();
        return view('backend/customer/index',compact('department_array'));
    }

    public function create()
    {
        return view('backend/customer/create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('backend/customer/edit');
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
