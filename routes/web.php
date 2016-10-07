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

//Route::get('/', 'PostController@index');
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
//Route::get('posts', 'PostController@index');
//Route::get('posts/create', 'PostController@create');
//Route::get('posts/{id}', 'PostController@show');
//Route::post('posts', 'PostController@store');

Route::resource('posts', 'PostController');

Route::get('profile', 'UserController@edit')->name('profile.edit');
Route::patch('profile/{id}', 'UserController@update')->name('profile.update');

Auth::routes();

Route::get('/', 'HomeController@index');