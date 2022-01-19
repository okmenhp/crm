<?php

namespace App\Repositories;

use Repositories\Support\AbstractRepository;

class FileUserRepository extends AbstractRepository
{
    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\FileUser';
    }
    public function getNewsIds($category_ids)
    {
        return $this->model->whereIn('category_id', $category_ids)->pluck('news_id');
    }

}