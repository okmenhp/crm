<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function() {
	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('/admin',  'Backend\BackendController@index');
});
