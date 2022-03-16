<?php

use App\Http\Controllers\Backend\CustomerContactorController;
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
    Route::get('/customer/edit/{id}',  ['as' => 'admin.customer.edit', 'uses' => 'Backend\CustomerController@edit']);
    Route::post('/customer/update/{id}',  ['as' => 'admin.customer.update', 'uses' => 'Backend\CustomerController@update']);
    Route::delete('/customer/delete/{id}',  ['as' => 'admin.customer.destroy', 'uses' => 'Backend\CustomerController@destroy']);
    Route::get('/customer/detail/{id}', ['as' => 'admin.customer.detail', 'uses' => 'Backend\CustomerController@show']);

    //khách hàng
    Route::get('/contract',  ['as' => 'admin.contract.index', 'uses' => 'Backend\ContractController@index']);
    Route::get('/contract/create',  ['as' => 'admin.contract.create', 'uses' => 'Backend\ContractController@create']);
    Route::post('/contract/store',  ['as' => 'admin.contract.store', 'uses' => 'Backend\ContractController@store']);
    Route::get('/contract/edit/{id}',  ['as' => 'admin.contract.edit', 'uses' => 'Backend\ContractController@edit']);
    Route::post('/contract/update/{id}',  ['as' => 'admin.contract.update', 'uses' => 'Backend\ContractController@update']);
    Route::delete('/contract/delete/{id}',  ['as' => 'admin.contract.destroy', 'uses' => 'Backend\ContractController@destroy']);

    Route::get('/',  'Backend\AuthController@login');
    //Route::get('/forgot-password',  'Backend\AuthController@forgot_password');

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

    // Lịch trình
    Route::get('/calendar',  ['as' => 'admin.calendar.index', 'uses' => 'Backend\CalendarController@index']);
    Route::get('/calendar/type',  ['as' => 'admin.calendar.type', 'uses' => 'Backend\CalendarController@type']);
    Route::post('/calendar/type/create',  ['as' => 'admin.calendar.type.create', 'uses' => 'Backend\CalendarController@createType']);
    Route::post('/calendar/type/update',  ['as' => 'admin.calendar.type.update', 'uses' => 'Backend\CalendarController@updateType']);
    Route::post('/calendar/type/delete',  ['as' => 'admin.calendar.type.delete', 'uses' => 'Backend\CalendarController@deleteType']);
    Route::get('/calendar/meeting',  ['as' => 'admin.calendar.meeting', 'uses' => 'Backend\CalendarController@meeting']);

    Route::post('/calendar/meeting/create',  ['as' => 'admin.calendar.meeting.create', 'uses' => 'Backend\CalendarController@createMeeting']);
    Route::post('/calendar/meeting/update',  ['as' => 'admin.calendar.meeting.update', 'uses' => 'Backend\CalendarController@updateMeeting']);
    Route::post('/calendar/meeting/delete',  ['as' => 'admin.calendar.meeting.delete', 'uses' => 'Backend\CalendarController@deleteMeeting']);

    //Kanban
    Route::get('/kanban/{project_id}',  ['as' => 'admin.kanban.index', 'uses' => 'Backend\KanbanController@index']);

    // Loai Du an
    Route::get('/project-type',  ['as' => 'admin.project_type.index', 'uses' => 'Backend\ProjectTypeController@index']);
    Route::get('/project-type/create',  ['as' => 'admin.project_type.create', 'uses' => 'Backend\ProjectTypeController@create']);
    Route::post('/project-type/store',  ['as' => 'admin.project_type.store', 'uses' => 'Backend\ProjectTypeController@store']);
    Route::get('/project-type/edit/{id}',  ['as' => 'admin.project_type.edit', 'uses' => 'Backend\ProjectTypeController@edit']);
    Route::post('/project-type/update/{id}',  ['as' => 'admin.project_type.update', 'uses' => 'Backend\ProjectTypeController@update']);
    Route::delete('/project-type/delete/{id}',  ['as' => 'admin.project_type.destroy', 'uses' => 'Backend\ProjectTypeController@destroy']);

    // Loai Khach hang
    Route::get('/customer-type',  ['as' => 'admin.customer_type.index', 'uses' => 'Backend\CustomerTypeController@index']);
    Route::get('/customer-type/create',  ['as' => 'admin.customer_type.create', 'uses' => 'Backend\CustomerTypeController@create']);
    Route::post('/customer-type/store',  ['as' => 'admin.customer_type.store', 'uses' => 'Backend\CustomerTypeController@store']);
    Route::get('/customer-type/edit/{id}',  ['as' => 'admin.customer_type.edit', 'uses' => 'Backend\CustomerTypeController@edit']);
    Route::post('/customer-type/update/{id}',  ['as' => 'admin.customer_type.update', 'uses' => 'Backend\CustomerTypeController@update']);
    Route::delete('/customer-type/delete/{id}',  ['as' => 'admin.customer_type.destroy', 'uses' => 'Backend\CustomerTypeController@destroy']);

    // Loai Khach hang
    Route::get('/task-kanban',  ['as' => 'admin.task_kanban.index', 'uses' => 'Backend\TaskKanbanController@index']);
    Route::get('/task-kanban/create',  ['as' => 'admin.task_kanban.create', 'uses' => 'Backend\TaskKanbanController@create']);
    Route::post('/task-kanban/store',  ['as' => 'admin.task_kanban.store', 'uses' => 'Backend\TaskKanbanController@store']);
    Route::get('/task-kanban/edit/{id}',  ['as' => 'admin.task_kanban.edit', 'uses' => 'Backend\TaskKanbanController@edit']);
    Route::post('/task-kanban/update',  ['as' => 'admin.task_kanban.update', 'uses' => 'Backend\TaskKanbanController@update']);
    Route::delete('/task-kanban/delete/{id}',  ['as' => 'admin.task_kanban.destroy', 'uses' => 'Backend\TaskKanbanController@destroy']);

    // Nguoi lien lac cua khach hang
    // Route::get('/customer-contactor',  ['as' => 'admin.customer_contactor.index', 'uses' => 'Backend\CustomerContactorController@index']);
    // Route::get('/customer-contactor/create',  ['as' => 'admin.customer_contactor.create', 'uses' => 'Backend\CustomerContactorController@create']);
    Route::post('/customer-contactor/store',  ['as' => 'admin.customer_contactor.store', 'uses' => 'Backend\CustomerContactorController@store']);
    Route::get('/customer-contactor/edit/{id}',  ['as' => 'admin.customer_contactor.edit', 'uses' => 'Backend\CustomerContactorController@edit']);
    Route::post('/customer-contactor/update/{id}',  ['as' => 'admin.customer_contactor.update', 'uses' => 'Backend\CustomerContactorController@update']);
    Route::delete('/customer-contactor/delete/{id}',  ['as' => 'admin.customer_contactor.destroy', 'uses' => 'Backend\CustomerContactorController@destroy']);
    // Route::post('contactorDatatable', [
    //     'uses' => 'Backend\CustomerContactorController@contactorDatatable'
    // ]);
    Route::post('contactorDatatable', [CustomerContactorController::class, 'contactorDatatable'])->name('contactorDatatable');
    Route::post('/add-contactor', [CustomerContactorController::class, 'store'])->name('contactor.add');
});
