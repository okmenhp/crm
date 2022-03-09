<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class UserTaskRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Models\UserTask';
    }

    public function readFE($request)
    {
        return $this->model->all();
    }

}
