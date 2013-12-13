<?php

Route::get('/', ['as' => 'twits', 'uses' => 'TwitsController@index'])->before('auth');

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('login', 'SessionsController@store')->before('csrf');

Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

