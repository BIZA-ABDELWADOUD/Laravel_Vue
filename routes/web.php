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

Route::get('/taskslist','TaskController@index');
Route::post('/taskslist','TaskController@store');
Route::get('/tasks/edit/{id}','TaskController@edit');
Route::patch('/tasks/edit/{id}','TaskController@update');
Route::delete('/tasks/{id}','TaskController@destroy');

Route::get('/users','UserController@index');
Route::post('/users','UserController@store');
Route::get('/users/edit/{id}','UserController@edit');
Route::patch('/users/edit/{id}','UserController@update');
Route::delete('/users/{id}','UserController@destroy');
