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

Route::get('/', 'TestController@showTestList');
Route::get('/scoreboard', 'CustomersController@scoreboard');

Route::get('/{id}', 'QuestionsController@showQuestions');
Route::put('/{id}', 'CustomersController@update');

Route::get('/the-end/{id}', 'QuestionsController@theEnd');
Route::put('/the-end/{id}', 'CustomersController@save');
Route::delete('/the-end/{id}', 'CustomersController@destroy');
