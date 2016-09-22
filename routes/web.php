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

// Route::get('contact', 'PagesController@getContact');
//
// Route::get('about', 'PagesController@getAbout');
//
// Route::get('/', 'PagesController@getIndex');


Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('posts', 'PostController@index');
//Route::get('posts/create', 'PostController@create');
//Route::get('posts/{id}', 'PostController@show');
//Route::post('posts', 'PostController@store');

Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/', 'HomeController@index');
