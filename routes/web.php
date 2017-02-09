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
Route::get('/fixedOrders/{id}', 'FixedOrderController@show')->name('fixedOrders.show');
Route::get('/cstallpromotion/{id}', 'CustomerController@stallPromotion')->name('customers.promotion');

Route::get('/cstallcustomize/{id}', 'CustomerController@stallCustomize')->name('customers.customize');
Route::post('/customizeOrders', 'CustomizeOrderController@create')->name('customizeOrders.create');
Route::post('/customizeOrders/hell', 'CustomizeOrderController@store')->name('customizeOrders.store');
Route::get('/customizeOrders/{id}', 'CustomizeOrderController@show')->name('customizeOrders.show');

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
    Route::resource('promotions', 'PromotionsController');
    Route::resource('dishes', 'DishesController');

});

Route::group(['middleware' => 'admin'], function(){
   // Route::get('/vendors', 'AdminController@index')->name('admins.index') /*->middleware('admin')*/;
    Route::get('/logs', 'LogsController@index')->name('logs.index');
    Route::delete('/logs', 'LogsController@destroyAll')->name('logs.destroy');
    Route::get('/logs/{id}', 'LogsController@edit')->name('logs.edit');
    Route::put('/logs/{id}', 'LogsController@update')->name('logs.update');
    Route::resource('vendors', 'VendorController');
    Route::post('/ingredients.receive', 'IngredientsController@receive')->name('ingredients.receive');
    Route::resource('ingredients', 'IngredientsController');
});

Route::group(['middleware' => 'admin' || 'vendor'], function(){
    Route::post('/logout', 'LoginController@logout');
    
});

Route::get('/ajaxcall/{ing_id?}',function($ing_id){
    $ing = \App\Ingredient::find($ing_id);
    return Response::json($ing->nutrition);
});