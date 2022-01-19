<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class FileRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\File';
    }

    public function validateCreate() {
        return $rules = [
            'username' => 'required|unique:user',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'role_id' => 'required'
        ];
    }
    public function validateUpdate($id) {
        return $rules = [
            'username' => 'required|unique:user,username,' . $id . ',id',
            'role_id' => 'required'
        ];
    }

    function getAllUser() {
        $users = $this->model->where('role_id', '<>', \App\User::ROLE_ADMIN)->get();
        return $users;
    }

    public function getParent($request, $uid){
        if($uid != 0){
        $parent_id = $this->model->where('uid', $uid)->first()->id;
        return $parent_id;
        }
        return $parent_id = null;
    }
}
