<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function() {
	Route::get('file/{uid}',  'Backend\FileController@index')->name('admin.file.index');
	// Route::get('/file/folder/{token}',  'Backend\FileController@index');
	Route::post('file/upload/{uid}','Backend\FileController@upload')->name('admin.file.upload');
	Route::post('file/open-folder/{uid}','Backend\FileController@openFolder')->name('admin.file.openFolder');
	Route::post('file/create-folder/{uid}','Backend\FileController@createFolder')->name('admin.file.createFolder');
	Route::delete('file/delete/{id}','Backend\FileController@destroy')->name('admin.file.delete');
	Route::post('file/restore/{id}','Backend\FileController@restore')->name('admin.file.restore');
	Route::get('file/property/{id}','Backend\FileController@property')->name('admin.file.property');
	Route::post('file/rename/{id}','Backend\FileController@rename')->name('admin.file.rename');
	Route::get('file/dowload/{id}','Backend\FileController@dowload')->name('admin.file.dowload');
	Route::post('file/share/{id}','Backend\FileController@share')->name('admin.file.share');
    //Route::move('file/move/{token}','Backend\FileController@move');
});