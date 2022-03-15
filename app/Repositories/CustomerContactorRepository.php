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
            'gender' => 'in:1,2',
            'phone_number' =>  [
                'regex:/^((03|05|07|08|09)[0-9]{8})$/',
            ],
            'email' => 'email',
            'date_of_birth' => 'before:today',
        ];
    }
    public function validateUpdate($id)
    {
        return $rules = [
            'name' => 'required',
            'customer_type_id' => 'required',
            'gender' => 'in:1,2',
            'phone_number' =>  [
                'regex:/^((03|05|07|08|09)[0-9]{8})$/',
            ],
            'email' => 'email',
            'date_of_birth' => 'before:today',
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

    public function getContactorByCustomerID($id)
    {
        $query = $this->model->where([
            'customer_id' => $id
        ]);
        $count = $query->count();
        $rows = $query->get();
        return [
            'rows' => $rows,
            'records_total' => $count
        ];
    }

    public function findAllContactor()
    {
        $query = $this->model->orderBy('id', 'DESC');
        $count = $query->count();
        $model = $query->get();
        dd($model);
        return [
            'data' => $model,
            'recordsTotal' => $count
        ];
    }

    public function countWhere(array $where, $columns = ['*'])
    {
        $model = $this->model->where($where)->count();
        return $model;
    }

    public function firstWhere(array $where, $columns = ['*'])
    {
        $result = $this->model->where($where)->get($columns)->first();
        return $result;
    }
}
