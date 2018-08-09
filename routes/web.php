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

Route::get('/', 'ProjectController@index');



Auth::routes();

Route::get('/home', 'ProjectController@index')->name('home');
Route::resource('projects', 'ProjectController');
Route::post('/projects/{project}/file', 'ProjectController@file');
Route::resource('users', 'UserController');
Route:: patch('users/{user}/deactivate', 'UserController@deactivate');
Route::patch('users/{user}/activate', 'UserController@activate');

Route::patch('tasks/{task}/complete', 'TaskController@complete');

Route::resource('tasks', 'TaskController');

Route::post('/projects/{project}/members', 'ProjectMemberController@store');

Route::get('/file/{file}', 'FileController@download');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/test', function(){
    return view('layouts.test');
});
