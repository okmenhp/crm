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
