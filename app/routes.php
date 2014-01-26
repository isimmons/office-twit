<?php

Route::group(['before' => 'auth'], function()
{
    Route::get('/', ['as' => 'twits', 'uses' => 'TwitsController@index']);

    Route::get('twits', 'TwitsController@index');

    //keep it alpha-numeric(remember to enforce this on username creation)
    Route::get('twits/{username}', 'TwitsController@show')->where('username', '[A-Za-z0-9]+');
    Route::post('twits/{username}', 'TwitsController@store')->before('csrf');

    Route::get('users', 'UsersController@index');
    Route::get('users/{username}/follow', 'UsersController@followUser');
    Route::get('users/{username}/unfollow', 'UsersController@unfollowUser');

    Route::get('profile', ['as' => 'user.profile.show', 'uses' => 'UserProfilesController@show']);
    Route::put('profile',  ['as' => 'user.profile.update', 'uses' => 'UserProfilesController@update'])->before('csrf');
});



Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('login', 'SessionsController@store')->before('csrf');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::get('register', 'UsersController@create');
Route::post('register', 'UsersController@store')->before('csrf');
