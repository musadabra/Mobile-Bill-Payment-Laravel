<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/vedor', 'Api\VendorController@index');
// Route::get('/vedor/{id}', 'Api\VendorController@show');
// Route::post('/vedor', 'Api\VendorController@create');
// Route::put('/vedor/{id}', 'Api\VendorController@update');
// Route::delete('/vedor/{id}', 'Api\VendorController@delete');


Route::group(['prefix' => 'Admin'], function () {
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
