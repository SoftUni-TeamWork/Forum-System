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

Route::get('/', array('before' => 'auth','UserController@logged'));
Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@index',
));

Route::get('/user/register', array(
    'before' => 'guest',
    'as' => 'user.register',
    'uses' => 'UserController@create'
));
Route::post('/user/register', 'UserController@store');

Route::get('user/login', array(
    'as' => 'user.login',
    'uses' => 'UserController@logged'
));
Route::post('user/login', 'UserController@login');

Route::get('/user/logout', array(
    'as' => 'user.logout',
    'uses' => 'UserController@logout'
));
Route::get('/user/{id}', 'UserController@show');