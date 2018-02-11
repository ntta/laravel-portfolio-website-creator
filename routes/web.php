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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*GENERAL INFORMATION*/
Route::get('/home/general-information', 'GeneralInformationController@index')->name('general-information');
Route::get('/home/general-information/edit', 'GeneralInformationController@edit');
Route::post('/home/general-information/edit-done', 'GeneralInformationController@update');

/*SPECIALITY*/
Route::get('/home/speciality', 'SpecialityController@index')->name('speciality');

Route::get('/home/speciality/add', 'SpecialityController@create');
Route::post('/home/speciality/add-done', 'SpecialityController@store');

Route::get('/home/speciality/edit/{id}', 'SpecialityController@edit');
Route::post('/home/speciality/edit-done/{id}', 'SpecialityController@update');

Route::get('/home/speciality/delete/{id}', 'SpecialityController@destroy');

Route::get('/home/speciality/change-use/{id}', 'SpecialityController@change');

/*SKILL*/
Route::get('/home/skill', 'SkillController@index')->name('skill');

Route::get('/home/skill/add', 'SkillController@create');
Route::post('/home/skill/add-done', 'SkillController@store');

Route::get('/home/skill/edit/{id}', 'SkillController@edit');
Route::post('/home/skill/edit-done/{id}', 'SkillController@update');

Route::get('/home/skill/delete/{id}', 'SkillController@destroy');

Route::get('/home/skill/change-use/{id}', 'SkillController@change');

/*QUALIFICATION*/
Route::get('/home/qualification', 'QualificationController@index')->name('qualification');

Route::get('/home/qualification/add', 'QualificationController@create');
Route::post('/home/qualification/add-done', 'QualificationController@store');

Route::get('/home/qualification/edit/{id}', 'QualificationController@edit');
Route::post('/home/qualification/edit-done/{id}', 'QualificationController@update');

Route::get('/home/qualification/delete/{id}', 'QualificationController@destroy');

Route::get('/home/qualification/change-use/{id}', 'QualificationController@change');

/*JOB*/
Route::get('/home/job', 'JobController@index')->name('job');
Route::get('/home/job/add', 'JobController@create');
Route::post('/home/job/add-done', 'JobController@store');

Route::get('/home/job/edit/{id}', 'JobController@edit');
Route::post('/home/job/edit-done/{id}', 'JobController@update');

Route::get('/home/job/delete/{id}', 'JobController@destroy');

Route::get('/home/job/change-use/{id}', 'JobController@change');

/*HOBBY*/
Route::get('/home/hobby', 'HobbyController@index')->name('hobby');
Route::get('/home/hobby/add', 'HobbyController@create');
Route::post('/home/hobby/add-done', 'HobbyController@store');

Route::get('/home/hobby/edit/{id}', 'HobbyController@edit');
Route::post('/home/hobby/edit-done/{id}', 'HobbyController@update');

Route::get('/home/hobby/delete/{id}', 'HobbyController@destroy');

Route::get('/home/hobby/change-use/{id}', 'HobbyController@change');

/*POST*/
Route::get('/home/post', 'PostController@index')->name('post');
Route::get('/home/post/add', 'PostController@create');
Route::post('/home/post/add-done', 'PostController@store');

Route::get('/home/post/edit/{id}', 'PostController@edit');
Route::post('/home/post/edit-done/{id}', 'PostController@update');

Route::get('/home/post/delete/{id}', 'PostController@destroy');

Route::get('/home/post/change-use/{id}', 'PostController@change');

/*TAG*/
Route::get('/home/tag', 'TagController@index')->name('tag');
Route::get('/home/tag/add', 'TagController@create');
Route::post('/home/tag/add-done', 'TagController@store');

Route::get('/home/tag/edit/{id}', 'TagController@edit');
Route::post('/home/tag/edit-done/{id}', 'TagController@update');

Route::get('/home/tag/delete/{id}', 'TagController@destroy');

Route::get('/home/tag/change-use/{id}', 'TagController@change');

/*BLOG*/
Route::get('/blog/{id}', 'BlogController@index')->name('blog');
Route::get('/blog/viewpost/{id}', 'BlogController@show');
Route::get("/blog/download-cv/{id}","BlogController@downloadCV");

/*MESSAGE*/
Route::get('/home/message', 'MessageController@index')->name('message');
Route::get('/home/message/delete/{id}', 'MessageController@destroy');
Route::get('/home/message/change-use/{id}', 'MessageController@change');
Route::post('blog/send-your-message/{id}', 'MessageController@store');

/*CUSTOM CSS*/
Route::get('/home/customcss', 'GeneralInformationController@editCustomCss');