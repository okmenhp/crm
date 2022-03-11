<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('file/property','Api\FileController@property')->name('api.file.property');
Route::post('file/rename','Api\FileController@rename')->name('api.file.rename');
Route::get('file/dowload','Api\FileController@dowload')->name('api.file.dowload');
Route::get('file/load-share-for/{id}','Api\FileController@load_share_for')->name('api.file.load_share_for');
Route::get('file/info/{id}','Api\FileController@info')->name('api.file.info');
Route::get('file/view/{id}','Api\FileController@view')->name('api.file.view');

//kanban
Route::post('kanban/index','Api\KanbanController@index')->name('api.kanban.index');
Route::post('kanban/create-card','Api\KanbanController@create_card')->name('api.kanban.create_card');
Route::post('kanban/create-board','Api\KanbanController@create_board')->name('api.kanban.create_board');
Route::post('kanban/update-card','Api\KanbanController@update_card')->name('api.kanban.update_card');
Route::post('kanban/update-board','Api\KanbanController@update_board')->name('api.kanban.update_board');
Route::post('kanban/card-detail','Api\KanbanController@card_detail')->name('api.kanban.card_detail');
//Route::post('kanban/add-card','Api\KanbanController@add_card')->name('api.kanban.add_card');

//project
Route::get('project/index','Api\ProjectController@index')->name('api.project.index');
// Route::get('project/create-project','Api\ProjectController@create')->name('api.project.create');
// Route::get('project/update-project','Api\ProjectController@update')->name('api.project.update');

//schedule
Route::post('schedule/index','Api\ScheduleController@index')->name('api.schedule.index');
Route::post('schedule/detail','Api\ScheduleController@detail')->name('api.schedule.detail');
Route::post('schedule/defaultFormInsert','Api\ScheduleController@defaultFormInsert')->name('api.schedule.defaultFormInsert');
Route::post('schedule/insert','Api\ScheduleController@insert')->name('api.schedule.insert');
Route::post('schedule/update','Api\ScheduleController@update')->name('api.schedule.update');
Route::post('schedule/delete','Api\ScheduleController@delete')->name('api.schedule.delete');

Route::get('task/checked','Api\KanbanController@checked')->name('api.task.checked');

Route::get('calendar/type/edit','Api\ScheduleController@typeEdit')->name('api.calendar.type.edit');

