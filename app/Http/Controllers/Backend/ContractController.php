<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Department;
use App\Models\Customer;
use App\Models\Contract;
use App\Repositories\DepartmentRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\ContractRepository;

class ContractController extends BaseController
{

    public function __construct(DepartmentRepository $departmentRepo, CustomerRepository $customerRepo, Contract $contractRepo) {
        $this->departmentRepo = $departmentRepo;
        $this->customerRepo = $customerRepo;
        $this->contractRepo = $contractRepo;
    }

    public function index()
    {
        $department_array = $this->departmentRepo->all();
        $records = $this->contractRepo->all();
        return view('backend/contract/index',compact('department_array','records'));
    }

    public function create()
    {
        return view('backend/contract/create');
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
