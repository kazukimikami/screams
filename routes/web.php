<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Controllerにルーテイング
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/scream', 'App\Http\Controllers\ScreamController@index');
Route::get('/register', 'App\Http\Controllers\RegisterController@index');
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('/logout', 'App\Http\Controllers\LogoutController@index');
