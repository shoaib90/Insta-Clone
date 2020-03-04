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

Auth::routes();

Route::get('/p/create', 'PostsController@create'); #Reference to these create and store function is taken from actions taken by resource controller.
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show'); //using restful controllers.(profile.show)
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit'); //these names we are not using right now.
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update'); //these names we are not using right now.
