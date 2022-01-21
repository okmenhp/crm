<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function() {
	Route::get('/home',  'Backend\BackendController@index');

	Route::get('/position',  'Backend\PositionController@index');
	Route::get('/edit-position',  'Backend\PositionController@edit');
	Route::get('/create-position',  'Backend\PositionController@create');

	Route::get('/department',  'Backend\DepartmentController@index');
	Route::get('/edit-department',  'Backend\DepartmentController@edit');
	Route::get('/create-department',  'Backend\DepartmentController@create');

    Route::get('/employee',  'Backend\EmployeeController@index');
	Route::get('/edit-employee',  'Backend\EmployeeController@edit');
	Route::get('/create-employee',  'Backend\EmployeeController@create');

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

	Route::get('/file',  'Backend\FileController@index');

	Route::get('/calendar',  'Backend\CalendarController@index');

});
