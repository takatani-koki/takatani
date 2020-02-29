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

Route::get('/', function () {
    return view('welcome');
    });
Route::group(["prefix"=>"admin"],function(){
    Route::get("news/create","Admin\NewsController@add")->middleware('auth');
    Route::post('news/create','Admin\NewsController@create'); #追記　PHP laravel 14
});
Route::get("admin/profile/create","Admin\ProfileController@add")->middleware('auth');

#追記　php laravel 14 課題
Route::post("admin/profile/create","Admin\ProfileController@create");
#追記　php laravel 14 終了

Route::get("admin/profile/edit","Admin\ProfileController@editAction")->middleware('auth');

#追記　php laravel 14 課題
Route::post("admin/profile/edit","Admin\ProfileController@update");
#追記　php laravel 14 終了


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
