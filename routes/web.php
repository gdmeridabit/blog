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

//HOME FOR GUEST
Route::get('/', function () {
    return view('base');
});

//REGISTRATION
Route::get('/registration', 'auth\RegistrationController@index');
Route::post('/register', 'auth\RegistrationController@register');

//LOGIN
Route::get('/logout', 'auth\LoginController@logout')->middleware('auth');

//USER
Route::get('/home/{url}', 'user\HomeController@index')->middleware('auth');
Route::get('/home/{url}/update', 'auth\UpdateUserDetailsController@index')->middleware('auth');
Route::post('/home/{url}/submit', 'auth\UpdateUserDetailsController@update')->middleware('auth');


//ADMIN
Route::get('/admin', 'user\AdminHomeController@index')->middleware('auth');
Route::get('/admin/{id}/{action}', 'user\AdminHomeController@action')->middleware('auth');
