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

Route::get('/home', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/post', 'PostController@post')->name('post');
Route::get('/post/show/{id}', 'PostController@show')->name('posts.show');
Route::get('/post/create', 'PostController@create')->name('posts.create');
Route::post('/post/store', 'PostController@store')->name('posts.store');
Route::get('/post/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('posts.update');

Route::get('/', function () {
    return view('welcome');
});
