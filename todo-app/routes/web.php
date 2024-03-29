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
	return view('welcome');
});

Route::get('todos', 'TodosController@index')->name('tasks');

Route::get('todos/filter/{filter}', 'TodosController@filter');

Route::get('todos/{todo}', 'TodosController@show');

Route::get('new-todos', 'TodosController@create')->name('create-tasks');

Route::post('store-todos', 'TodosController@store');

Route::get('todos/{todo}/edit', 'TodosController@edit');

Route::post('todos/{todo}/update-todos', 'TodosController@update');

Route::get('todos/{$todo}/complete', 'TodosController@complete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
