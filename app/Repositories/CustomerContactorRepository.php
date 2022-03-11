<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class CustomerContactorRepository extends AbstractRepository
{

    public function __construct(\Illuminate\Container\Container $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return 'App\Models\CustomerContactor';
    }

    public function validateCreate()
    {
        return $rules = [
            'name' => 'required',
            'customer_type_id' => 'required',
        ];
    }
    public function validateUpdate($id)
    {
        return $rules = [
            'name' => 'required',
            'customer_type_id' => 'required',
        ];
    }

    public function deleteWhereIn($field, array $where)
    {
        $model = $this->model->whereIn($field, $where);
        $deleted = $model->delete();
        return $deleted;
    }

    public function deleteWhere(array $where, $value = null)
    {
        $model = $this->model->where($where);
        $deleted = $model->delete();
        return $deleted;
    }
}
