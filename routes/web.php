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

//--------------------------------------------
//              admine routes
//--------------------------------------------
Route::prefix('admin')->group(function(){    
    //authontication
    Route::get('/login','Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    //dashboard (index)
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
    //categories
    Route::get('/categories','Admin\CategoryController@index')->name('admin.categories');
    Route::get('/categories/create','Admin\CategoryController@create')->name('admin.create.categories');
    Route::post('/category/store','Admin\CategoryController@store')->name('admin.category.store');
    Route::get('/category/{id}/delete','Admin\CategoryController@destroy');
    Route::get('/category/{id}/edit','Admin\CategoryController@edite');
    Route::post('/category/update','Admin\CategoryController@update')->name('admin.category.update');
    //sub-categories
    Route::get('/sub-categories','Admin\CategoryController@index')->name('admin.sub-categories');
    Route::get('/sub-categories/create','Admin\Sub_CategoryController@create')->name('admin.create.sub_categories');    
    Route::post('/sub_category/store','Admin\Sub_CategoryController@store')->name('admin.sub_category.store');
    Route::get('/sub-category/{id}/delete','Admin\Sub_CategoryController@destroy');
    Route::get('/sub-category/{id}/edit','Admin\Sub_CategoryController@edite');    
    Route::get('/sub-category/get_sub_categories_from_category_id/{id}','Admin\Sub_CategoryController@get_sub_categories_from_category_id');
    Route::post('/sub_category/update','Admin\Sub_CategoryController@update')->name('admin.sub_category.update');
    //sub-sub-categories
    Route::get('/sub-sub-categories','Admin\CategoryController@index')->name('admin.sub-sub-categories');
    Route::get('/sub-sub-categories/create','Admin\Sub_Sub_CategoryController@create')->name('admin.create.sub_sub_categories');                
    Route::post('/sub_sub_category/store','Admin\Sub_Sub_CategoryController@store')->name('admin.sub_sub_category.store');        
    Route::get('/sub-sub-category/{id}/delete','Admin\Sub_Sub_CategoryController@destroy');            
    Route::get('/sub-sub-category/{id}/edit','Admin\Sub_Sub_CategoryController@edite');
    Route::get('/sub-sub-category/get_sub_sub_categories_from_category_id/{id}','Admin\Sub_Sub_CategoryController@get_sub_sub_categories_from_category_id');        
    Route::post('/sub_sub_category/update','Admin\Sub_Sub_CategoryController@update')->name('admin.sub_sub_category.update');
    //deals
    Route::get('/deals','Admin\DealController@index')->name('admin.deals');
    Route::get('/deal/create','Admin\DealController@create')->name('admin.add.deal');
    Route::post('/deal/store','Admin\DealController@store')->name('admin.deal.store');
    Route::get('/deal/{id}/delete','Admin\DealController@destroy');
    Route::get('/deal/{id}/edit','Admin\DealController@edit');
    Route::post('/deal/update','Admin\DealController@update')->name('admin.deal.update');
    //products
    Route::get('/products','Admin\ProductController@index')->name('admin.products');    
    Route::get('/product/{id}/delete','Admin\ProductController@destroy');
    Route::get('/product/{id}/edit','Admin\ProductController@edit');
    Route::post('/product/update','Admin\ProductController@update')->name('admin.product.update');
    Route::get('/product/create','Admin\ProductController@create')->name('admin.create.product');
    Route::post('/product/store','Admin\ProductController@store')->name('admin.product.store');
    //
    Route::get('/product/{id}/add-color','Admin\ProductController@add_color');
    Route::get('/product/{id}/edit-color','Admin\ProductController@edit_color');
    Route::post('/product/add-color/store','Admin\ProductController@store_color')->name('admin.add-color-to-product.store');
    Route::post('/product/edit-color/update','Admin\ProductController@update_color')->name('admin.edit-color-to-product.update');
    Route::get('/product/{id}/delete-color','Admin\ProductController@delete_product_color');
    //
    Route::get('/product/{id}/add-size','Admin\ProductController@add_size');
    Route::get('/product/{id}/edit-size','Admin\ProductController@edit_size');
    Route::post('/product/add-size/store','Admin\ProductController@store_size')->name('admin.add-size-to-product.store');
    Route::post('/product/edit-size/update','Admin\ProductController@update_size')->name('admin.edit-size-to-product.update');
    Route::get('/product/{id}/delete-size','Admin\ProductController@delete_product_size');
    //
    Route::get('/product/{id}/add-images','Admin\ProductController@add_images');
    Route::post('/product/add-image/store','Admin\ProductController@store_image')->name('admin.add-image-to-product.store');
    Route::get('/product/{id}/edit-image','Admin\ProductController@edit_image');
    Route::post('/product/edit-image/update','Admin\ProductController@update_image')->name('admin.edit-image-to-product.update');
    Route::get('/product/{id}/delete-image','Admin\ProductController@delete_image');
    //brands
    Route::get('/brands','Admin\BrandController@index')->name('admin.brands');    
    Route::get('/brand/{id}/delete','Admin\BrandController@destroy');
    Route::get('/brand/{id}/edit','Admin\BrandController@edit');
    Route::post('/brand/update','Admin\BrandController@update')->name('admin.brand.update');
    Route::get('/brand/create','Admin\BrandController@create')->name('admin.create.brand');
    Route::post('/brand/store','Admin\BrandController@store')->name('admin.brand.store');
    //suppliers
    Route::get('/suppliers','Admin\SupplierController@index')->name('admin.suppliers');    
    Route::get('/supplier/{id}/delete','Admin\SupplierController@destroy');
    Route::get('/supplier/{id}/edit','Admin\SupplierController@edit');
    Route::post('/supplier/update','Admin\SupplierController@update')->name('admin.supplier.update');
    Route::get('/supplier/create','Admin\SupplierController@create')->name('admin.create.supplier');
    Route::post('/supplier/store','Admin\SupplierController@store')->name('admin.supplier.store');
    //users
    Route::get('/users','Admin\UserController@index')->name('admin.users');    
    Route::get('/user/{id}/delete','Admin\UserController@destroy');
    Route::get('/user/{id}/edit','Admin\UserController@edit');
    Route::post('/user/update','Admin\UserController@update')->name('admin.user.update');
    Route::get('/user/create','Admin\UserController@create')->name('admin.create.user');
    Route::post('/user/store','Admin\UserController@store')->name('admin.user.store');
    //colors
    Route::get('/colors','Admin\ColorController@index')->name('admin.colors');    
    Route::get('/color/{id}/delete','Admin\ColorController@destroy');
    Route::get('/color/{id}/edit','Admin\ColorController@edit');
    Route::post('/color/update','Admin\ColorController@update')->name('admin.color.update');
    Route::get('/color/create','Admin\ColorController@create')->name('admin.create.color');
    Route::post('/color/store','Admin\ColorController@store')->name('admin.color.store');
    //sizes
    Route::get('/sizes','Admin\SizeController@index')->name('admin.sizes');
    Route::get('/size/{id}/delete','Admin\SizeController@destroy');
    Route::get('/size/{id}/edit','Admin\SizeController@edit')->name('admin.size.edit');
    Route::post('/size/update','Admin\SizeController@update')->name('admin.size.update');
    Route::get('/size/create','Admin\SizeController@create')->name('admin.create.size');
    Route::post('/size/store','Admin\SizeController@store')->name('admin.size.store');
    //sales
    Route::get('/sales','Admin\CompletedSaleController@index')->name('admin.sales');
    //consumers
    Route::get('/consumers','Admin\ConsumersController@index')->name('admin.consumers');
    //searsh-words
    Route::get('/searsh-words','Admin\SearshWordsController@index')->name('admin.searsh-words');
    //orders
    Route::get('/Orders','Admin\OrderController@index')->name('admin.orders');
});

//--------------------------------------------
//              store routes
//--------------------------------------------
//home
Route::get('/home', 'HomeController@index')->name('home');
//products
Route::get('/products', 'ProductsController@index')->name('products');
