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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('cart')->group(function(){
    Route::get('/', 'CartController@getAll');
    Route::post('/', 'CartController@addCart');
    Route::delete('/{id}','CartController@destroy');
    Route::get('/checkout','CartController@checkout');
});
