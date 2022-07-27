<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contactus', 'HomeController@contactus')->name('contact');

Route::prefix('product')->name('product')->group(function(){
    Route::get('/', 'ProductController@shop');
    Route::get('/latest','ProductController@latestItem')->name('.latest');
});

Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::prefix('cart')->group(function(){
    Route::get('/tes','CartController@loaddata');
    Route::get('/','CartController@index')->name('cart');
    Route::post('/addCart','CartController@addCart')->name('addCart');
    Route::delete('/{id}','CartController@destroy');
});
Route::prefix('wishlist')->group(function(){
    // Route::get('/tes','CategoryController@tes');
    Route::get('/', 'WishlistController@index')->name('wishlist');
    Route::post('/addWishlist','WishlistController@addWishlist')->name('addWishlist');
    Route::delete('/{id}','WishlistController@destroy');
    Route::get('/reset', 'WishlistController@clearWishlist')->name('resetWishlist');
});
