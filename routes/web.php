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

//Normal Pages
Route::get('/', 'PagesController@home');

Route::get('/discover', 'PagesController@discover');

Route::resource('stories','StoriesController');

Auth::routes();

Route::get('/mystories', 'MystoriesController@index')->name('mystories');

//Like & Unlike
Route::put('/like','LikesController@like');
Route::put('/unlike','LikesController@unlike');

