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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');

Route::get('profile', 'UserController@edit')->name('profile.edit');
Route::post('profile', 'UserController@update_avatar')->name('profile.update_avatar');
Route::patch('profile/{id}', 'UserController@update')->name('profile.update');

//Route::get('profile', 'UserController@pdf_create')->name('make.pdf');

Route::resource('posts', 'PostController');
Route::get('posts/{id}/delete', 'PostController@deleteImage')->name('posts.imageDelete');


