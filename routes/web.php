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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['web']], function() {
	Route::get('/home', 'HomeController@index');
	Route::get('/schools', 'SchoolController@getSchools');
	Route::get('/schools/add', 'SchoolController@addSchool');
	Route::post('/schools/add', 'SchoolController@saveSchool');
	Route::get('/schools/{school}/edit', 'SchoolController@editSchool');
	Route::get('/schools/{school}/delete', 'SchoolController@deleteSchool');
	Route::get('/schools/{school}/restore', 'SchoolController@restoreSchool');
	Route::patch('/schools/{school}', 'SchoolController@updateSchool');
});