<?php

Route::group(['namespace' => 'Pool\Dashboard\Controllers', 'middleware' => 'loggedIn'], function() {
    Route::get('dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'IndexController@index'
    ]);
    Route::get('users', [
        'as' => 'admin.userList',
        'uses' => 'UserController@index'
    ]);
    Route::get('dashboard/personal', [
        'as' => 'user.personal',
        'uses' => 'UserController@getProfile'
    ]);
    Route::post('users-details', [
        'as' => 'user.details',
        'uses' => 'UserController@profile'
    ]);
    Route::get('dashboard/car', [
        'as' => 'user.carDetail',
        'uses' => 'UserController@getCarDetail'
    ]);
    Route::post('dashboard/car', [
        'as' => 'user.saveCarDetail',
        'uses' => 'UserController@saveCarDetail'
    ]);
});
