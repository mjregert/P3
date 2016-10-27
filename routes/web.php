<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PageController')->name('page.index');

/* Shortcut Notation - Intentionally commented out but shown for example */
//Route::resource('users', 'UserController');

/* Full Notatoin for all 7 routes */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users/create', 'UserController@store')->name('users.store');
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'UserController@update')->name('users.update');
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('/passwords', 'PasswordController@index')->name('passwords.index');
Route::get('/passwords/create', 'PasswordController@create')->name('passwords.create');
Route::post('/passwords/create', 'PasswordController@store')->name('passwords.store');
