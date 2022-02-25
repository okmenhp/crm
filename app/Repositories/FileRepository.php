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

    public function getFileByUid($request, $uid){
        $user_id = \Auth::user()->id;
        $parent_folder = $this->model->where('uid', $uid)->first();
        if($request->is_bin == 1){
            $records = $this->model->where('status', 3)->where('parent_id', $parent_folder->id)->get();
        }elseif($request->is_share == 1){
            $department_id = \Auth::user()->department->id;
            $records = $this->model->where('status', '!=', 3)->where('created_by' , '!=', $user_id)->where('parent_id', $parent_folder->id)->get($columns);
            foreach($records as $key => $record){
                if($record->share_type == 1){
                    if(!in_array($user_id, explode(',', $record->share_for))){
                        unset($records[$key]);
                    }
                }elseif($record->share_type == 2){
                    if(!in_array($department_id, explode(',', $record->share_for))){
                        unset($records[$key]);
                    }
                }else{
                    unset($records[$key]);
                }
            }
        }
        else{
            $records = $this->model->where('status','!=', 3)->where('parent_id', $parent_folder->id)->get();
        }
        return $records;
        }

    public function getChildren($id){
        $children = $this->model->where('parent_id', $id)->get();
        return $children;
    }

    public function getParent($request, $uid){
        if($uid != "0"){
        $parent_id = $this->model->where('uid', $uid)->first()->id;
        return $parent_id;
        }
        return $parent_id = null;
    }

    public function listFile($request, $columns = array('*'), $parent_id) {
        $user_id = \Auth::user()->id;
        if($request->is_bin == 1){
            $records = $this->model->where('status', 3)->where('created_by', $user_id)->where('parent_id', $parent_id)->get($columns);;
        }elseif($request->is_share == 1){
            $department_id = \Auth::user()->department->id;
            $records = $this->model->where('status', '!=', 3)->where('created_by' , '!=', $user_id)->where('parent_id', $parent_id);
            $records = $records->get($columns);
            foreach($records as $key => $record){
                if($record->share_type == 1){
                    if(!in_array($user_id, explode(',', $record->share_for))){
                        unset($records[$key]);
                    }
                }elseif($record->share_type == 2){
                    if(!in_array($department_id, explode(',', $record->share_for))){
                        unset($records[$key]);
                    }
                }else{
                    unset($records[$key]);
                }
            }
        }
        else{
            $records = $this->model->where('parent_id', $parent_id)->where('created_by', $user_id)->where('status', '!=', 3)->get($columns);;
        }
        return $records;
    }

    public function readSharedFile($request, $columns = array('*'), $parent_id) {
        if($request->is_bin == 1){
            $records = $this->model->where('status', 3)->where('parent_id', $parent_id)->get($columns);
        }else{
            $records = $this->model->where('parent_id', $parent_id)->where('status', '!=', 3)->get($columns);
        }
        return $records;
    }
}
