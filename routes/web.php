<?php

use Illuminate\Support\Facades\Route;

Route::get('auth', 'AuthController@index')->name('auth');
Route::post('login', 'AuthController@do_login');
Route::post('register', 'AuthController@do_register');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('logout', 'AuthController@do_logout')->name('logout');
});
Route::group(['middleware' => 'auth:web','verified'], function () {
    Route::get('/', function(){
        return redirect()->route('home');
    });
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('{user:username}', 'HomeController@show');
    
    Route::post('merchant', 'MerchantController@store')->name('merchant_store');
    Route::post('merchant/{merchant}/edit', 'MerchantController@edit');
    Route::post('merchant/{merchant}/update', 'MerchantController@update');

    Route::post('comment', 'CommentController@store')->name('komentar_store');
    
    Route::post('product', 'ProductController@store')->name('product_store');
    Route::post('product/{product}/edit', 'ProductController@edit');
    Route::post('product/{product}/update', 'ProductController@update');
    Route::post('product/{product}/delete', 'ProductController@destroy');
});