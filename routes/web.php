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

Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::get('/scream', 'App\Http\Controllers\ScreamController@index');

Route::get('/register', 'App\Http\Controllers\RegisterController@index');

Route::get('/login', 'App\Http\Controllers\LoginController@index');

Route::get('/logout', 'App\Http\Controllers\LogoutController@index');
