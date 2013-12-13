<?php

Route::get('/', ['as' => 'twits', 'uses' => 'TwitsController@index'])->before('auth');
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);