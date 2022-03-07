<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class ListRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\Board';
    }

    public function validateCreate() {
        return $rules = [
          
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
          
        ];
    }

   

}
