<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class ProjectRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\Project';
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
        return $query->orderBy('id', 'DESC')->get();
    }

}