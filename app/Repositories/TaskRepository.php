<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use App\Models\User;
use App\Models\Task;

class TaskRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\Task';
    }

    public function validateCreate() {
        return $rules = [
            'name' => 'required',
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
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

        // $value = \DB::table('user_task')->join('task', 'task.id', '=', 'user_task.task_id')->join('user', 'user_task.user_id', '=', 'user.id')->get();
        $value = $query->orderBy('task.id', 'DESC')->get();
        return $value;


    }



}
