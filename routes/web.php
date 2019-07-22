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


Route::namespace('BackEnd')->prefix('admin')->group(function(){
Route::get('/', 'HomeController@index');
Route::resource('users','UserController')->except('show','delete');	
Route::resource('categories','CategoryController')->except('show','delete');	
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
