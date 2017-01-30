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

Route::get('/', function () {return view('landing');});
Route::get('/cstalls', 'CustomerController@index')->name('customers.index');
Route::get('/cstalls/{id}', 'CustomerController@stallHome')->name('customers.stall');
Route::get('/cstallmain/{id}', 'CustomerController@stallMains')->name('customers.mains');
Route::get('/fixedOrders/create/{id}', 'FixedOrderController@create')->name('fixedOrders.create');
Route::post('/fixedOrders', 'FixedOrderController@store')->name('fixedOrders.store');

Route::group(['middleware' => 'visitors'], function(){
    Route::get('/register', 'RegistrationController@register');
    Route::post('/register', 'RegistrationController@postRegister');

    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');
    Route::get('/forgot-password', 'ForgetPasswordController@forgotPassword');
    Route::post('/forgot-password', 'ForgetPasswordController@postForgotPassword');
    Route::get('/reset/{email}/{resetCode}', 'ForgetPasswordController@resetPassword');
    Route::post('/reset/{email}/{resetCode}', 'ForgetPasswordController@postResetPassword');
    Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');
});

Route::group(['middleware' => 'vendor'], function(){
    Route::get('/landing', 'VendorController@landing')->name('vendorhome');
    Route::resource('stalls', 'StallsController');
    Route::resource('dishes', 'DishesController');
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/earnings', 'AdminController@earnings')->middleware('admin');

});

Route::group(['middleware' => 'admin' || 'vendor'], function(){
    Route::post('/logout', 'LoginController@logout');

});

