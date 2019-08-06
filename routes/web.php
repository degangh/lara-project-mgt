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
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('tasks', 'TaskController');
    Route::resource('users', 'UserController');
    Route::get('act/{user}', 'SettingController@loginAs');
    Route::patch('users/{user}/{action}', 'UserController@updateActiveStatus');
    Route::post('/projects/{project}/members', 'ProjectMemberController@store');
    Route::get('/file/{file}', 'FileController@download');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('lang/{locale}','SettingController@lang');
    Route::get('/notification/new', 'NotificationController@newNotifications');
    Route::get('/notification/inbox', 'NotificationController@inbox');
    Route::patch('/notification/{notification}/viewed', 'NotificationController@markAsViewed');
    Route::get('/notification/{notification}/viewed', 'NotificationController@markAsViewed');
    Route::get('/my/tasks' , 'TaskController@myTasks');
    Route::get('/home', 'ProjectController@index')->name('home');
    Route::resource('projects', 'ProjectController');
    Route::post('/projects/{project}/file', 'ProjectController@file');
    Route::patch('tasks/{task}/complete', 'TaskController@complete');

});

Route::get('/test', function(){
    return view('layouts.test2');
});


