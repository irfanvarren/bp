<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registration/daftar-payment-channel','BP\WebController@daftar_payment_channel')->name('api-daftar-payment-channel');


Route::post('/payment-notification','BP\WebController@payment_notification');


Route::get('test',function(){
	return "test";
});