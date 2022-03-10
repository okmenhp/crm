<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class EmployeeRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\Employee';
    }

    public function validateCreate() {
        return $rules = [
            'name' => 'required',
            'code' =>'required|unique:employee',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'email|unique:employee',
            'birthday' => 'required|before:today',
            'department_id' => 'required',
            'position_id' => 'required',
            'id_card' => 'required|unique:employee',
            'gender' => 'required',
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
            'code' =>'required|unique:employee,code,' . $id . ',id',
            'email' => 'email|unique:employee,email,' . $id . ',id',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'required|before:today',
            'department_id' => 'required',
            'position_id' => 'required',
            'id_card' => 'required|unique:employee,id_card,' . $id . ',id',
            'gender' => 'required',
        ];
    }

    public function validateUpdateWithPassword($id) {
        return $rules = [
            'username' => 'required|unique:user,username,' . $id . ',id',
            'password' => 'min:6|max:32',
            'c_password' => 'min:6|max:32|same:password',
        ];
    }

    public function readFE($request) {
        $query = $this->queryAll();
        if ($request !== NULL) {
            $keywords_search = $request->get('keywords_search');
            $department_search = $request->get('department_search');
            if (!is_null($keywords_search)) {
                $query = $query->where('name', 'LIKE', "%" . $keywords_search . "%");
            }
            if (!is_null($department_search)) {
                $query = $query->whereIn('department_id', 'LIKE', "%" . $department_search . "%");
            }

        }
        return $query->select('id','name','avatar')->orderBy('id', 'DESC')->get();
    }

}
