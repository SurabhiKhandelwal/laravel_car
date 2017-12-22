<?php
/*
  |--------------------------------------------------------------------------
  | Authorization Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::group(['middleware' => 'isLogin'], function () {
    Route::get('/admin-login', [
        'as' => 'login',
        'uses' => 'Pool\Auth\Controllers\LoginController@create'
    ]);
});

Route::post('/admin-login', [
    'as' => 'login-post',
    'uses' => 'Pool\Auth\Controllers\LoginController@store'
]);

//Social Login
Route::get('/login/{provider?}', [
    'uses' => 'Pool\Auth\Controllers\RegistrationController@getSocialAuth',
    'as' => 'auth.getSocialAuth'
]);


Route::get('/login/callback/{provider?}', [
    'uses' => 'Pool\Auth\Controllers\RegistrationController@getSocialAuthCallback',
    'as' => 'auth.getSocialAuthCallback'
]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'Pool\Auth\Controllers\LoginController@logout'
]);
