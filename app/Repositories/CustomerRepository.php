<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class CustomerRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\Customer';
    }

    public function validateCreate() {
        return $rules = [
            'name' => 'required|unique:customer|max:255'
        ];
    }
    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required|unique:customer,name,' . $id . ',id|max:255',
        ];
    }

}