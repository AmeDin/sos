<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'visitors'], function(){
    Route::get('/register', 'RegistrationController@register');
    Route::post('/register', 'RegistrationController@postRegister');

    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');
    Route::get('/forgot-password', 'ForgetPasswordController@forgotPassword');
    Route::post('/forgot-password', 'ForgetPasswordController@postForgotPassword');
});

Route::group(['middleware' => 'vendor'], function(){
    Route::get('/landing', 'VendorController@landing');
    Route::resource('stalls', 'StallsController');

});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/earnings', 'AdminController@earnings')->middleware('admin');

});

Route::group(['middleware' => 'admin' || 'vendor'], function(){
    Route::post('/logout', 'LoginController@logout');

});

Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');