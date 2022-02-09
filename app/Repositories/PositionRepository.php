<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class PositionRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\Position';
    }

    public function validateCreate() {
        return $rules = [
            'name' => 'required|unique:position|max:255'
        ];
    }
    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required|unique:position,name,' . $id . ',id|max:255',
        ];
    }
  
}
