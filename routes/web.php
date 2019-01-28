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

Route::get('/login', 'HomeController@login')->name('login');
Route::post('/doLogin', 'HomeController@doLogin')->name('doLogin');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/register', 'HomeController@register')->name('register');

Route::group(['prefix'=>'post'], function(){
	Route::get('/', 'PostController@post')->name('post');
	Route::get('/show/{id}', 'PostController@show')->name('posts.show');
	Route::get('/create', 'PostController@create')->name('posts.create');
	Route::post('/store', 'PostController@store')->name('posts.store');
	Route::get('/edit/{id}', 'PostController@edit')->name('posts.edit');
	Route::post('/update/{id}', 'PostController@update')->name('posts.update');
	Route::get('/delete/{id}', 'PostController@delete')->name('posts.delete');
});

Route::post('/ajax/like', 'LikeController@like')->name('posts.like');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('index');
