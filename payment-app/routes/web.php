<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    // VENDOR CRUD Route

    Route::get('/getAllVendor', 'VendorController@index');
    Route::get('/getVendor/{id}', 'VendorController@show');
    Route::post('/createVendor', 'VendorController@create');
    Route::put('/updateVendor/{id}', 'VendorController@update');
    Route::delete('/deleteVendor/{id}', 'VendorController@delete');

    // Offer CRUD Route
    Route::get('/getAllOffer', 'OfferController@index');
    Route::get('/getOffer/{id}', 'OfferController@show');
    Route::post('/createOffer', 'OfferController@create');
    Route::put('/updateOffer/{id}', 'OfferController@update');
    Route::delete('/deleteOffer/{id}', 'OfferController@delete');
});

Route::get('/', function () {
    if (auth()->user()) {
        return view('home');
    } else {
        return view('auth.login');
    }
})->name("base");

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/home', function () {
    return view("home");
});

Auth::routes();

Route::get('/logout', 'Auth\Logincontroller@logout');
