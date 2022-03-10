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

    public function listSearchCustomerType($searchWord)
    {
        $query = $this->model;
        if ($searchWord !== null && $searchWord != '') {
            array_push($arrClause, [
                function ($query) use ($searchWord) {
                    $query
                        ->where([['name', 'LIKE', "%" . $searchWord . "%"]])
                        ->orWhere([['code', 'LIKE', '%' . $searchWord . '%']])
                        ->orWhere([['description', 'LIKE', '%' . $searchWord . '%']]);
                }
            ]);
            $query = $this->model->where($arrClause);
        }
        $count = $query->count();
        $model = $query->skip(0)->take(100)->get();
        // dd($model);
        return $model;
        // $query = $this->queryAll();
        // if ($request !== NULL) {
        //     $searchWord = $request->get('search_word');
        //     if ($searchWord !== null && $searchWord != '') {
        //         $query = $query
        //             ->where('name', 'LIKE', "%" . $searchWord . "%")
        //             ->orWhere([['code', 'LIKE', '%' . $searchWord . '%']])
        //             ->orWhere([['description', 'LIKE', '%' . $searchWord . '%']]);
        //     }
        // }
        // $model = $query->orderBy('id', 'DESC')->get();
        // // dd($model);
        // return $model;

    }

    public function searchType($request)
    {
        $query = $this->queryAll();
        if ($request !== NULL) {
            $searchWord = $request->get('search_word');
            if (!is_null($searchWord)) {
                $query = $query
                    ->where([['name', 'LIKE', "%" . $searchWord . "%"]])
                    ->orWhere([['code', 'LIKE', '%' . $searchWord . '%']])
                    ->orWhere([['description', 'LIKE', '%' . $searchWord . '%']]);
            }
        }
        $model = $query->orderBy('id', 'DESC')->paginate(10);
        // dd($model);
        return $model;
    }
}
