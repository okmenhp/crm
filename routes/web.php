<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

Route::get('/get-otp', ['as' => 'get_otp', 'uses' => 'Auth\AuthController@get_otp']);
Route::post('/send-otp', ['as' => 'send_otp', 'uses' => 'Auth\AuthController@send_otp']);
Route::get('/forgot-password', ['as' => 'forgot_password', 'uses' => 'Auth\AuthController@forgot_password']);
Route::post('/change-password', ['as' => 'change_password', 'uses' => 'Auth\AuthController@change_password']);

Route::get('/tabledemo', function () {
    return view('backend/customer/tableDemo');
});
