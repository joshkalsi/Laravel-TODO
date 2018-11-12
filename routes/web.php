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

Route::get('', function () {
 return redirect('tasks');
});

Route::get('tasks', 'TaskController@index')->name('task.index');

Route::get('tasks/{task}', 'TaskController@show')->name('task.show');

Route::get('tasks/{task}/edit', 'TaskController@edit')->name('task.edit');
