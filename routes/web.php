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

Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function(){
	
	Route::get('/home', 'HomeController@index')->name('dashboard.index');
	Route::resource('users','UserController')->except('show','delete');
	Route::resource('categories','CategoryController')->except('show','delete');	
	Route::resource('skills','SkillController')->except('show','delete');	
	Route::resource('tags','TagController')->except('show','delete');	
	Route::resource('pages','PageController')->except('show','delete');	
	Route::resource('videos','VideoController')->except('show','delete');	
	Route::resource('messeges','MessageController');
	Route::post('messeges/replay/{id}', 'MessageController@replay')->name('message.replay');

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
	Route::get('/contact', 'HomeController@storeMessege')->name('contact.store');
	Route::get('/','HomeController@welcome')->name('frontend.landing');	
	Route::get('/page/{id}/{slug?}', 'HomeController@page')->name('front.page');
	Route::get('/profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');


	
 	Route::middleware('auth')->group(function(){
	Route::post('/comments/{id}', 'HomeController@commentUpdate')->name('front.comment.update');
	Route::post('/comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');

	Route::post('/profile', 'HomeController@profileUpdate')->name('profile.update');

	});
