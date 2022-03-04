<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function () {
    Route::get('/home',  ['as' => 'admin.index', 'uses' => 'Backend\BackendController@index']);

    Route::get('/role',  'Backend\RoleController@index');
    Route::get('/edit-role',  'Backend\RoleController@edit');
    Route::get('/create-role',  'Backend\RoleController@create');

    //profile
    Route::get('/user/edit_profile/{id}', ['as' => 'admin.user.index_profile', 'uses' => 'Backend\UserController@editProfile']);
    Route::post('/user/update_profile/{id}', ['as' => 'admin.user.update_profile', 'uses' => 'Backend\UserController@updateProfile']);


    //Quản lý công việc

    //Dự án
    Route::get('/project',  ['as' => 'admin.project.index', 'uses' => 'Backend\ProjectController@index']);
    Route::get('/project/create',  ['as' => 'admin.project.create', 'uses' => 'Backend\ProjectController@create']);
    Route::post('/project/store',  ['as' => 'admin.project.store', 'uses' => 'Backend\ProjectController@store']);
    Route::get('/project/edit/{id}',  ['as' => 'admin.project.edit', 'uses' => 'Backend\ProjectController@edit']);
    Route::post('/project/update/{id}',  ['as' => 'admin.project.update', 'uses' => 'Backend\ProjectController@update']);
    Route::delete('/project/delete/{id}',  ['as' => 'admin.project.destroy', 'uses' => 'Backend\ProjectController@destroy']);
    //Công việc
    Route::get('/task',  ['as' => 'admin.task.index', 'uses' => 'Backend\TaskController@index']);
    Route::get('/task/create',  ['as' => 'admin.task.create', 'uses' => 'Backend\TaskController@create']);
    Route::post('/task/store',  ['as' => 'admin.task.store', 'uses' => 'Backend\TaskController@store']);
    Route::get('/task/edit/{id}',  ['as' => 'admin.task.edit', 'uses' => 'Backend\TaskController@edit']);
    Route::post('/task/update/{id}',  ['as' => 'admin.task.update', 'uses' => 'Backend\TaskController@update']);
    Route::delete('/task/delete/{id}',  ['as' => 'admin.task.destroy', 'uses' => 'Backend\TaskController@destroy']);
    //Vấn đề
    Route::get('/problem',  ['as' => 'admin.problem.index', 'uses' => 'Backend\ProblemController@index']);
    Route::get('/problem/create',  ['as' => 'admin.problem.create', 'uses' => 'Backend\ProblemController@create']);
    Route::post('/problem/store',  ['as' => 'admin.problem.store', 'uses' => 'Backend\ProblemController@store']);
    Route::get('/problem/edit/{id}',  ['as' => 'admin.problem.edit', 'uses' => 'Backend\ProblemController@edit']);
    Route::post('/problem/update/{id}',  ['as' => 'admin.problem.update', 'uses' => 'Backend\ProblemController@update']);
    Route::delete('/problem/delete/{id}',  ['as' => 'admin.problem.destroy', 'uses' => 'Backend\ProblemController@destroy']);


    //Quản lý khách hàng

    //Khách hàng
    Route::get('/customer',  ['as' => 'admin.customer.index', 'uses' => 'Backend\CustomerController@index']);
    Route::get('/customer/create',  ['as' => 'admin.customer.create', 'uses' => 'Backend\CustomerController@create']);
    Route::post('/customer/store',  ['as' => 'admin.customer.store', 'uses' => 'Backend\CustomerController@store']);
    Route::get('/customer/edit/{id}',  ['as' => 'admin.customer.edit', 'uses' => 'Backend\ProblemController@edit']);
    Route::post('/customer/update/{id}',  ['as' => 'admin.customer.update', 'uses' => 'Backend\ProblemController@update']);
    Route::delete('/customer/delete/{id}',  ['as' => 'admin.customer.destroy', 'uses' => 'Backend\ProblemController@destroy']);

    //khách hàng
    Route::get('/contract',  ['as' => 'admin.contract.index', 'uses' => 'Backend\ContractController@index']);
    Route::get('/contract/create',  ['as' => 'admin.contract.create', 'uses' => 'Backend\ContractController@create']);
    Route::post('/contract/store',  ['as' => 'admin.contract.store', 'uses' => 'Backend\ContractController@store']);
    Route::get('/contract/edit/{id}',  ['as' => 'admin.contract.edit', 'uses' => 'Backend\ContractController@edit']);
    Route::post('/contract/update/{id}',  ['as' => 'admin.contract.update', 'uses' => 'Backend\ContractController@update']);
    Route::delete('/contract/delete/{id}',  ['as' => 'admin.contract.destroy', 'uses' => 'Backend\ContractController@destroy']);

    Route::get('/',  'Backend\AuthController@login');
    //Route::get('/forgot-password',  'Backend\AuthController@forgot_password');
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

    //Kanban
    Route::get('/kanban/{project_id}',  ['as' => 'admin.kanban.index', 'uses' => 'Backend\KanbanController@index']);
});