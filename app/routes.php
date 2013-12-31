<?php

Route::group(['before' => 'auth'], function()
{
    Route::get('/', ['as' => 'twits', 'uses' => 'TwitsController@index']);

    Route::get('twits', 'TwitsController@index');

    Route::get('users', 'UsersController@index');

    Route::get('profile', 'UsersController@profile');
});



Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('login', 'SessionsController@store')->before('csrf');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

