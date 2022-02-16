<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function () {
    Route::get('/home',  ['as' => 'admin.index', 'uses' => 'Backend\BackendController@index']);

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
    //Người dùng hệ thống user
    Route::get('/user',  ['as' => 'admin.user.index', 'uses' => 'Backend\UserController@index']);
    Route::get('/user/create',  ['as' => 'admin.user.create', 'uses' => 'Backend\UserController@create']);
    Route::post('/user/store',  ['as' => 'admin.user.store', 'uses' => 'Backend\UserController@store']);
    Route::get('/user/edit/{id}',  ['as' => 'admin.user.edit', 'uses' => 'Backend\UserController@edit']);
    Route::post('/user/update/{id}',  ['as' => 'admin.user.update', 'uses' => 'Backend\UserController@update']);
    Route::delete('/user/delete/{id}',  ['as' => 'admin.user.destroy', 'uses' => 'Backend\UserController@destroy']);
    //Nhân sự employee
    Route::get('/employee',  ['as' => 'admin.employee.index', 'uses' => 'Backend\EmployeeController@index']);
    Route::get('/employee/create',  ['as' => 'admin.employee.create', 'uses' => 'Backend\EmployeeController@create']);
    Route::post('/employee/store',  ['as' => 'admin.employee.store', 'uses' => 'Backend\EmployeeController@store']);
    Route::get('/employee/edit/{id}',  ['as' => 'admin.employee.edit', 'uses' => 'Backend\EmployeeController@edit']);
    Route::post('/employee/update/{id}',  ['as' => 'admin.employee.update', 'uses' => 'Backend\EmployeeController@update']);
    Route::delete('/employee/delete/{id}',  ['as' => 'admin.employee.destroy', 'uses' => 'Backend\EmployeeController@destroy']);
    //Chức vụ
    Route::get('/positon',  ['as' => 'admin.position.index', 'uses' => 'Backend\PositionController@index']);
    Route::get('/positon/create',  ['as' => 'admin.position.create', 'uses' => 'Backend\PositionController@create']);
    Route::post('/positon/store',  ['as' => 'admin.position.store', 'uses' => 'Backend\PositionController@store']);
    Route::get('/positon/edit/{id}',  ['as' => 'admin.position.edit', 'uses' => 'Backend\PositionController@edit']);
    Route::post('/positon/update/{id}',  ['as' => 'admin.position.update', 'uses' => 'Backend\PositionController@update']);
    Route::delete('/positon/delete/{id}',  ['as' => 'admin.position.destroy', 'uses' => 'Backend\PositionController@destroy']);

    //Phòng ban
    Route::get('/department',  ['as' => 'admin.department.index', 'uses' => 'Backend\DepartmentController@index']);
    Route::get('/department/create',  ['as' => 'admin.department.create', 'uses' => 'Backend\DepartmentController@create']);
    Route::post('/department/store',  ['as' => 'admin.department.store', 'uses' => 'Backend\DepartmentController@store']);
    Route::get('/department/edit/{id}',  ['as' => 'admin.department.edit', 'uses' => 'Backend\DepartmentController@edit']);
    Route::post('/department/update/{id}',  ['as' => 'admin.department.update', 'uses' => 'Backend\DepartmentController@update']);
    Route::delete('/department/delete/{id}',  ['as' => 'admin.department.destroy', 'uses' => 'Backend\DepartmentController@destroy']);
});