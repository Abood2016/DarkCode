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
Route::get('/',function(){
	return view('welcome');
})->name('frontend.landing');	

Route::group(['prefix' =>'admin', 'namespace' => 'BackEnd'],function(){
	
	Route::get('/home', 'HomeController@index')->name('dashboard.index');
	Route::resource('users','UserController')->except('show','delete');
	Route::resource('categories','CategoryController')->except('show','delete');	
	Route::resource('skills','SkillController')->except('show','delete');	
	Route::resource('tags','TagController')->except('show','delete');	
	Route::resource('pages','PageController')->except('show','delete');	
	Route::resource('videos','VideoController')->except('show','delete');	
	Route::post('video/comments','VideoController@commentStore')->name('comment.store');	
	Route::delete('comments/delete/{id}','VideoController@destroyComment')->name('comment.destroy');
	Route::post('comments/update/{id}','VideoController@UpdateComment')->name('comment.update');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@category')->name('front.category');
Route::get('/skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('/video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('/tags/{id}', 'HomeController@tags')->name('front.tags');
