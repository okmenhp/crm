<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class ProjectTypeRepository extends AbstractRepository
{

    public function __construct(\Illuminate\Container\Container $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return 'App\Models\ProjectType';
    }

    public function validateCreate()
    {
        return $rules = [
            'name' => 'required|unique:project_type',
        ];
    }

    public function validateUpdate($id)
    {
        return $rules = [
            'name' => 'required|unique:project_type,name,' . $id . ',id',
        ];
    }
}
