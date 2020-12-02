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
    Route::get('/categories','Admin\CategoryController@index')->name('admin.categories');
    Route::get('/sub-categories','Admin\CategoryController@index')->name('admin.sub-categories');
    Route::get('/sub-sub-categories','Admin\CategoryController@index')->name('admin.sub-sub-categories');
    Route::get('/categories/create','Admin\CategoryController@create')->name('admin.create.categories');
    Route::get('/sub-categories/create','Admin\Sub_CategoryController@create')->name('admin.create.sub_categories');
    Route::get('/sub-sub-categories/create','Admin\Sub_Sub_CategoryController@create')->name('admin.create.sub_sub_categories');
    Route::post('/category/store','Admin\CategoryController@store')->name('admin.category.store');
    Route::post('/sub_category/store','Admin\Sub_CategoryController@store')->name('admin.sub_category.store');
    Route::post('/sub_sub_category/store','Admin\Sub_Sub_CategoryController@store')->name('admin.sub_sub_category.store');
    Route::get('/category/{id}/delete','Admin\CategoryController@destroy');
    Route::get('/sub-category/{id}/delete','Admin\Sub_CategoryController@destroy');
    Route::get('/sub-sub-category/{id}/delete','Admin\Sub_Sub_CategoryController@destroy');
    Route::get('/category/{id}/edit','Admin\CategoryController@edite');
    Route::get('/sub-category/{id}/edit','Admin\Sub_CategoryController@edite');
    Route::get('/sub-sub-category/{id}/edit','Admin\Sub_Sub_CategoryController@edite');
    Route::post('/category/update','Admin\CategoryController@update')->name('admin.category.update');
    Route::post('/sub_category/update','Admin\Sub_CategoryController@update')->name('admin.sub_category.update');
    Route::post('/sub_sub_category/update','Admin\Sub_Sub_CategoryController@update')->name('admin.sub_sub_category.update');
});

//---------------------------------------------------

Route::get('/home', 'HomeController@index')->name('home');
