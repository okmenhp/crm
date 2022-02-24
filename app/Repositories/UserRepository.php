<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class UserRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\User';
    }

    public function validateCreate() {
        return $rules = [
            'full_name' => 'required',
            'username' =>'required|unique:user',
            'code' =>'required|unique:user',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'email|unique:user',
            'birthday' => 'required|before:today',
            'department_id' => 'required',
            'position_id' => 'required',
            'password' => 'required|min:6|max:32',
            'c_password' => 'required|same:password',
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'full_name' => 'required',
            'username' =>'required|unique:user,username,' . $id . ',id',
            'code' =>'required|unique:user,code,' . $id . ',id',
            'email' => 'email|required|unique:user,email,' . $id . ',id',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'required|before:today',
            'department_id' => 'required',
            'position_id' => 'required',
        ];
    }

    public function validateUpdateWithPassword($id) {
        return $rules = [
            'full_name' => 'required',
            'username' =>'required|unique:user,username,' . $id . ',id',
            'code' =>'required|unique:user,code,' . $id . ',id',
            'email' => 'email|unique:user,email,' . $id . ',id',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'required|before:today',
            'department_id' => 'required',
            'position_id' => 'required',
            'password' => 'required|min:6|max:32',
            'c_password' => 'required|min:6|max:32|same:password',
        ];
    }

    function getAllUser() {
        $users = $this->model->where('role_id', '<>', \App\User::ROLE_ADMIN)->get();
        return $users;
    }

}
