<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function() {
	Route::get('file/{uid}',  'Backend\FileController@index')->name('admin.file.index');
	// Route::get('/file/folder/{token}',  'Backend\FileController@index');
	Route::post('file/upload/{uid}','Backend\FileController@upload')->name('admin.file.upload');
	Route::post('file/open-folder/{uid}','Backend\FileController@openFolder')->name('admin.file.openFolder');
	Route::post('file/create-folder/{uid}','Backend\FileController@createFolder')->name('admin.file.createFolder');
	Route::delete('file/delete/{id}','Backend\FileController@destroy')->name('admin.file.delete');
    Route::post('file/rename/{id}','Backend\FileController@rename');
    //Route::move('file/move/{token}','Backend\FileController@move');
});