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

Route::get('articles/{id}/destory','ArticleController@destroy');
Route::get('articles/{id}/publish','ArticleController@publish');
Route::resource('articles','ArticleController');
Route::resource('labels','ArticleLabelController');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/dinner', 'DinnerController@show');
Route::get('/dinner/edit', 'DinnerController@edit');
Route::get('/dinner/show', 'DinnerController@show');
Route::get('/dinner/delete/{id}', 'DinnerController@delete');
Route::post('/dinner/store', 'DinnerController@store');
Route::post('/notify', 'NoticeApiController@notify');
Route::get('/user/notifications', 'UserController@notifications');
Route::post('/user/{user}/notifications/mark-as-read', 'NoticeApiController@markAsRead');
Route::get('/profile','UserController@profile');
Route::post('/profile','UserController@storeProfile');
Route::get('/search', 'DinnerController@search');
