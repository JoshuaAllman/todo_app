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

Route::get('/', 'TasksController@index')->name('tasks.view');
Route::post('/', 'TasksController@create')->name('tasks.create');
Route::put('/{task}', 'TasksController@update')->name('tasks.update');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Auth::routes();

