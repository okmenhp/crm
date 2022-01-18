<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function() {
	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('/admin',  'Backend\BackendController@index');
	Route::get('/position',  'Backend\PositionController@index');
	Route::get('/edit-position',  'Backend\PositionController@edit');
	Route::get('/create-position',  'Backend\PositionController@create');

	Route::get('/login',  'Backend\AuthController@login');
	Route::get('/register',  'Backend\AuthController@register');
	Route::get('/file',  'Backend\FileController@index');
	Route::get('/calendar',  'Backend\CalendarController@index');

});
