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

Route::get('/', 'VideoController@index');
Route::get('/home', 'VideoController@index');

Route::get('video-show/{id}','VideoController@show')->name('video.show');


Route::post('/video-upload','VideoController@store')->name('video.upload');
Route::get('/video-create','VideoController@create')->name('video.create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('comments/store/{id}','CommentsController@store')->name('comments.store');
