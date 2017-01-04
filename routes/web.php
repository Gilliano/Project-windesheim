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

Route::get('/home', 'HomeController@index');

Route::get('/menu', 'MenuController@index');

Route::get('/schools', 'SchoolController@getSchools');
Route::get('/schools/add', 'SchoolController@addSchool');
Route::post('/schools/add', 'SchoolController@saveSchool');
Route::get('/schools/{school}/edit', 'SchoolController@editSchool');
Route::get('/schools/{school}/delete', 'SchoolController@deleteSchool');
Route::get('/schools/{school}/restore', 'SchoolController@restoreSchool');
Route::patch('/schools/{school}', 'SchoolController@updateSchool');

Route::get('/persons', 'PersonsController@index');
Route::post('/persons', 'PersonsController@store');
Route::get('/persons/{id}', 'PersonsController@edit'); // TODO: Is 'edit' a good name?
Route::post('/persons/{id}', 'PersonsController@update');

Route::get('/users_information', 'UserInformationController@getUsers');
Route::get('/users_information/add', 'UserInformationController@addUser');
Route::post('/users_information/add', 'UserInformationController@saveUser');
Route::get('/users_information/{user_information}/edit', 'UserInformationController@editUser');
Route::get('/users_information/{user_information}/delete', 'UserInformationController@deleteUser');
Route::get('/users_information/{user_information}/restore', 'UserInformationController@restoreUser');
Route::patch('/users_information/{user_information}', 'UserInformationController@updateUser');

Route::get('/companies', 'CompanyController@getCompanies');
Route::get('/companies/add', 'CompanyController@addCompany');
Route::post('/companies/add', 'CompanyController@saveCompany');
Route::get('/companies/{company}/edit', 'CompanyController@editCompany');
Route::patch('/companies/{company}/update', 'CompanyController@updateCompany');
Route::get('/companies/{company}/delete', 'CompanyController@deleteCompany');
Route::get('/companies/{company}/restore', 'CompanyController@restoreCompany');

Route::get('/educations', 'EducationController@getEducations');
Route::get('/educations/add', 'EducationController@addEducation');
Route::post('educations/add', 'EducationController@saveEducation');
Route::get('educations/{education}/edit', 'EducationController@editEducation');
Route::patch('/educations/{education}/update', 'EducationController@updateEducation');
Route::get('/educations/{education}/delete', 'EducationController@deleteEducation');
Route::get('/educations/{education}/restore', 'EducationController@restoreEducation');

Route::get('/jobs', 'JobController@getJobs');
Route::get('/jobs/add', 'JobController@addJob');
Route::post('/jobs/add', 'JobController@saveJob');
Route::get('/jobs/{job}/edit', 'JobController@editJob');
Route::patch('/jobs/{job}/update', 'JobController@updateJob');
Route::get('/jobs/{job}/delete', 'JobController@deleteJob');
Route::get('/jobs/{job}/restore', 'JobController@restoreJob');

Route::get('/charts', 'ChartsController@index');
Route::get('/json/charts', 'JSONController@decide');

Route::get('/mail', 'MailController@setupMail');
Route::post('/mail/setup', 'MailController@sendMail');

Route::get('/profile', 'ProfileController@index');
Route::post('/profile/addSkill', 'ProfileController@addSkill');

Route::get('/search', 'SearchController@index');
Route::post('/searchResults', 'SearchController@results');

Route::group(['prefix' => 'api/v1', 'middleware' => 'api'], function() {
Route::resource('/cookies', 'CookieController');
});