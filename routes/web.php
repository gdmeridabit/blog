<?php

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

Auth::routes();
Auth::routes(['verify' => false, 'register' => false]);
Route::get('/', function () {
    return view('base');
});

Route::get('/registration', 'auth\RegistrationController@index');
Route::post('/register', 'auth\RegistrationController@register');
Route::get('/home', 'user\HomeController@index')->middleware('auth');
Route::get('/admin', 'user\AdminHomeController@index')->middleware('auth');
Route::get('/logout', 'auth\LoginController@logout')->middleware('auth');
