<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class CustomerTypeRepository extends AbstractRepository
{

    public function __construct(\Illuminate\Container\Container $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return 'App\Models\CustomerType';
    }

    public function validateCreate()
    {
        return $rules = [
            'code' => 'required|unique:customer_types',
            'name' => 'required|unique:customer_types',
        ];
    }

    public function validateUpdate($id)
    {
        return $rules = [
            'code' => 'required|unique:customer_types,code,' . $id . ',id',
            'name' => 'required|unique:customer_types,name,' . $id . ',id',
        ];
    }
}
