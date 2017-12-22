<?php

Route::group(['namespace' => 'Pool\Ride\Controllers'], function() {
    Route::get('ride', [
        'as' => 'ride.list',
        'uses' => 'IndexController@index'
    ]);
    Route::post('ride', [
        'as' => 'search.ride',
        'uses' => 'IndexController@index'
    ]);
    Route::get('offer-ride', [
        'as' => 'offer.ride',
        'uses' => 'RideController@offerRide'
    ]);
    Route::post('offer-ride', [
        'as' => 'offer.ride.post',
        'uses' => 'RideController@saveOfferRide'
    ]);
});
