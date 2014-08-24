<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', 'UserController@logged');
Route::get('/user/register', 'UserController@create');
Route::post('/user/register/new', 'UserController@store');
Route::get('user/login', 'UserController@logged1');
Route::post('user/login', 'UserController@login');

Route::get('/user/logout', 'UserController@logout');
Route::get('/user/{id}', 'UserController@show');
