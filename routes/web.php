<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index','App\Http\Controllers\TodoController@index')->name('index');

Route::get('/todoapp/create','App\Http\Controllers\TodoController@create');

Route::post('/todoapp/store','App\Http\Controllers\TodoController@store');

Route::get('/todoapp/update/{id}','App\Http\Controllers\TodoController@showUpdate');

Route::post('todoapp/updates','App\Http\Controllers\TodoController@update');

Route::get('/markcomplete/{id}','App\Http\Controllers\TodoController@markComplete');

Route::get('/markincomplete/{id}','App\Http\Controllers\TodoController@markIncomplete');

Route::get('/deleteTodo/{id}','App\Http\Controllers\TodoController@delete');

Route::get('/restore','App\Http\Controllers\TodoController@restore');

Route::get('/restoreTodo/{id}','App\Http\Controllers\TodoController@restoreTodo');

Route::get('/delTodo/{id}','App\Http\Controllers\TodoController@deletePermanently');