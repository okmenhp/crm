<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function() {
	Route::get('/file/{uid}',  'Backend\FileController@index');
	// Route::get('/file/folder/{token}',  'Backend\FileController@index');
	Route::post('file/upload/{uid}','Backend\FileController@upload')->name('admin.file.upload');
	Route::post('file/create-folder/{uid}','Backend\FileController@createFolder')->name('admin.file.createFolder');
	Route::delete('file/delete/{uid}','Backend\FileController@delete');
    Route::post('file/rename/{uid}','Backend\FileController@rename');
    //Route::move('file/move/{token}','Backend\FileController@move');
});