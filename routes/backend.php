<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function () {
    Route::get('/home',  ['as' => 'admin.index', 'uses' => 'Backend\BackendController@index']);


    Route::get('/department',  ['as' => 'admin.department.index', 'uses' => 'Backend\DepartmentController@index']);
    Route::get('/edit-department',  ['as' => 'admin.department.edit', 'uses' => 'Backend\DepartmentController@edit']);
    Route::get('/create-department',  ['as' => 'admin.department.create', 'uses' => 'Backend\DepartmentController@create']);

    Route::get('/employee',  ['as' => 'admin.employee.index', 'uses' => 'Backend\EmployeeController@index']);
    Route::get('/edit-employee',  ['as' => 'admin.employee.edit', 'uses' => 'Backend\EmployeeController@edit']);
    Route::get('/create-employee',  ['as' => 'admin.employee.create', 'uses' => 'Backend\EmployeeController@create']);

    Route::get('/role',  'Backend\RoleController@index');
    Route::get('/edit-role',  'Backend\RoleController@edit');
    Route::get('/create-role',  'Backend\RoleController@create');

    Route::get('/project',  'Backend\ProjectController@index');
    Route::get('/edit-project',  'Backend\ProjectController@edit');
    Route::get('/create-project',  'Backend\ProjectController@create');

    Route::get('/customer',  'Backend\CustomerController@index');
    Route::get('/edit-customer',  'Backend\CustomerController@edit');
    Route::get('/create-customer',  'Backend\CustomerController@create');

    Route::get('/',  'Backend\AuthController@login');

    Route::get('/forgot-password',  'Backend\AuthController@forgot_password');

    Route::get('/calendar',  ['as' => 'admin.calendar.index', 'uses' => 'Backend\CalendarController@index']);

    Route::get('/positon',  ['as' => 'admin.position.index', 'uses' => 'Backend\PositionController@index']);
    Route::get('/positon/create',  ['as' => 'admin.position.create', 'uses' => 'Backend\PositionController@create']);
    Route::post('/positon/store',  ['as' => 'admin.position.store', 'uses' => 'Backend\PositionController@store']);
    Route::get('/positon/edit/{id}',  ['as' => 'admin.position.edit', 'uses' => 'Backend\PositionController@edit']);
    Route::post('/positon/update/{id}',  ['as' => 'admin.position.update', 'uses' => 'Backend\PositionController@update']);
    Route::delete('/positon/delete/{id}',  ['as' => 'admin.position.destroy', 'uses' => 'Backend\PositionController@destroy']);
});