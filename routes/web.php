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
Route::get('/','Store\StoreController@index')->name('store');
Route::get('/products','Store\StoreController@products')->name('products');
Route::get('/product-page','Store\StoreController@product_page')->name('product-page');
Route::get('/checkout','Store\StoreController@checkout')->name('checkout');
Auth::routes();

//---------------admine routes-----------------------
Route::prefix('admin')->group(function(){    
    Route::get('/login','Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
});

//---------------------------------------------------

Route::get('/home', 'HomeController@index')->name('home');
