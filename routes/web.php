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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_register', 'App\Http\Controllers\AuthController@proses_register')->name('proses_register');

//route untuk mengecek admin atau user
Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['ceklogin:admin']], function () {
        Route::get('admin', 'App\Http\Controllers\AdminController@index')->name('admin');
    });

    Route::group(['middleware' => ['ceklogin:user']], function () {
        Route::get('user', 'App\Http\Controllers\UserController@index')->name('user');
    });
});
