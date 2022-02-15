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
            'username' => 'required|unique:user',
            'password' => 'required|min:6|max:32',
            'c_password' => 'required|min:6|max:32|same:password',
        ];
    }
    public function validateUpdate($id) {
        return $rules = [
            'username' => 'required|unique:user,username,' . $id . ',id',
        ];
    }
    public function validateUpdateWithPassword($id) {
        return $rules = [
            'username' => 'required|unique:user,username,' . $id . ',id',
            'password' => 'min:6|max:32',
            'c_password' => 'min:6|max:32|same:password',
        ];
    }

    function getAllUser() {
        $users = $this->model->where('role_id', '<>', \App\User::ROLE_ADMIN)->get();
        return $users;
    }

}
