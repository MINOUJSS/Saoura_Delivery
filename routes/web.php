<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
// Route::get('/test',function(){
    
//     return redirect()->intended(url('consumer/login'));    
// });
// Route::get('/checkout','Store\StoreController@checkout')->name('checkout');
Auth::routes(['verify'=>true]);

//--------------------------------------------
//              admine routes
//--------------------------------------------
Route::prefix('admin')->group(function(){    
    //authontication
    Route::get('/login','Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
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
    //slider deals
    Route::get('/slider-deals','Admin\DealController@index')->name('admin.slider.deals');
    Route::get('/slider-deal/create','Admin\DealController@create_slider')->name('admin.add.slider.deal');
    Route::post('/slider-deal/store','Admin\DealController@store_slider')->name('admin.deal.store');
    Route::get('/slider-deal/{id}/delete','Admin\DealController@destroy_slider');
    Route::get('/slider-deal/{id}/edit','Admin\DealController@edit_slider');
    Route::post('/slider-deal/update','Admin\DealController@update_slider')->name('admin.slider.deal.update');
    //sid deals
    Route::get('/sid-deals','Admin\DealController@sid_deal_index')->name('admin.sid.deals');
    Route::get('/sid-deal/create','Admin\DealController@create_sid_deal')->name('admin.add.sid.deal');
    Route::post('/sid-deal/store','Admin\DealController@store_sid_deal')->name('admin.sid.deal.store');
    Route::get('/sid-deal/{id}/delete','Admin\DealController@destroy_sid_deal');
    Route::get('/sid-deal/{id}/edit','Admin\DealController@edit_sid_deal');
    Route::post('/sid-deal/update','Admin\DealController@update_sid_deal')->name('admin.sid.deal.update');
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
    Route::get('/product/{id}/add-images','Admin\ProductController@add_images')->name('admin.product.add.images');
    Route::post('/product/add-image/store','Admin\ProductController@store_image')->name('admin.add-image-to-product.store');
    Route::get('/product/{id}/edit-image','Admin\ProductController@edit_image');
    Route::post('/product/edit-image/update','Admin\ProductController@update_image')->name('admin.edit-image-to-product.update');
    Route::get('/product/{id}/delete-image','Admin\ProductController@delete_image');    
    //
    Route::get('/product/{id}','Admin\ProductController@product_details')->name('admin.product.details');
    // generate slug generate_slug_for_all_products
    Route::get('/product/slug/generate','Admin\ProductController@generate_slug_for_all_products')->name('admin.product.generate.slugs');
    //reating
    Route::get('/reating/{id}/delete','Admin\ReatingController@destroy')->name('admin.reating.delete');
    //contact us
    Route::get('/all-contact','Admin\ContactController@index')->name('admin.all.contacts');
    Route::get('/contact/create','Admin\ContactController@create')->name('admin.create.contact');
    Route::post('/contact/store','Admin\ContactController@store')->name('admin.store.contact');
    Route::get('/contact/{id}/show','Admin\ContactController@show')->name('admin.contact.show');
    Route::get('/contact/{id}/create-reply','Admin\ContactController@create_reply')->name('admin.contact.reply');
    Route::post('/contact/store-reply','Admin\ContactController@store_reply')->name('admin.contact.reply.store');
    Route::get('/contact/{id}/delete','Admin\ContactController@destroy')->name('admin.contact.destroy');    
    //replys
    Route::get('/all-replys','Admin\ReplyController@index')->name('admin.all.replys');
    Route::get('/reply/{id}/show','Admin\ReplyController@show')->name('admin.reply.show');
    Route::get('/reply/{id}/delete','Admin\ReplyController@destroy')->name('admin.reply.destroy');
    //deleted contact
    Route::get('/all-deleted-contact','Admin\DeletedContactController@index')->name('admin.all.deleted.contacts');
    Route::get('/deleted-contact/{id}/delete','Admin\DeletedContactController@destroy')->name('admin.deleted.contact.delete');
    Route::get('/deleted-contact/{id}/recovery','Admin\DeletedContactController@recovery')->name('admin.deleted.contact.recovery');
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
    Route::get('/consumer/{id}/delete','Admin\ConsumersController@destroy')->name('admin.consumer.delete');
    //searsh-words
    Route::get('/searsh-words','Admin\SearshWordsController@index')->name('admin.searsh-words');
    //orders
    Route::get('/Orders','Admin\OrderController@index')->name('admin.orders');
    Route::get('/order/{id}','Admin\OrderController@order_details')->name('admin.order.details');
    Route::get('/order/{order_id}/confirm','Admin\OrderController@order_confirm')->name('admin.order.confirm');
    Route::get('/order/{order_id}/ship','Admin\OrderController@order_ship')->name('admin.order.ship');
    Route::get('/order/{order_id}/complate','Admin\OrderController@order_complate')->name('admin.order.complate');
    Route::post('/order/deny','Admin\OrderController@order_deny')->name('admin.order.deny');
    Route::post('/order/return','Admin\OrderController@order_return')->name('admin.order.return');
    Route::get('/order/{order_id}/product/{product_id}/delete','Admin\OrderController@delete_product_from_order')->name('admin.delete.product.from.order');
    Route::get('/order/deny-order-observation/index','Admin\OrderController@deny_order_observation')->name('admin.deny.order.observation');
    Route::get('/order/return-order-observation/index','Admin\OrderController@return_order_observation')->name('admin.return.order.observation');
    Route::get('/order/deny-order-observation/create','Admin\OrderController@create_deny_order_observation')->name('admin.deny.order.observation.create');
    Route::post('/order/deny-order-observation/store','Admin\OrderController@store_deny_order_observation')->name('admin.deny.order.observation.store');
    Route::get('/order/return-order-observation/create','Admin\OrderController@create_return_order_observation')->name('admin.return.order.observation.create');
    Route::post('/order/return-order-observation/store','Admin\OrderController@store_return_order_observation')->name('admin.return.order.observation.store');
    Route::get('/order/deny-order-observation/{id}/edit','Admin\OrderController@edit_deny_order_observation')->name('admin.deny.order.observation.edit');
    Route::get('/order/deny-order-observation/{id}/delete','Admin\OrderController@destroy_deny_order_observation')->name('admin.deny.order.observation.delete');
    Route::post('/order/deny-order-observation/update','Admin\OrderController@update_deny_order_observation')->name('admin.deny.order.observation.update');
    Route::get('/order/return-order-observation/{id}/edit','Admin\OrderController@edit_return_order_observation')->name('admin.return.order.observation.edit');
    Route::get('/order/return-order-observation/{id}/delete','Admin\OrderController@destroy_return_order_observation')->name('admin.return.order.observation.delete');
    Route::post('/order/return-order-observation/update','Admin\OrderController@update_return_order_observation')->name('admin.return.order.observation.update');
    //delivery list
    Route::get('/delivery/list','Admin\DeliveryController@index')->name('admin.delivery.list');
    Route::get('/delivery/list/print','Admin\DeliveryController@print')->name('admin.delivery.list.print');
    //SEO
    Route::get('/products/seo','Admin\SeoController@products_seo_index')->name('admin.products.seo');
    Route::get('/product/{id}/seo/create','Admin\SeoController@product_seo_create')->name('admin.create.product.seo');
    Route::post('/product/seo/store','Admin\SeoController@product_seo_store')->name('admin.store.product.seo');
    Route::get('/product/{id}/seo/edit','Admin\SeoController@product_seo_edit')->name('admin.edit.product.seo');
    Route::post('/product/seo/update','Admin\SeoController@product_seo_update')->name('admin.update.product.seo');
    Route::get('/product/seo/{id}/delete','Admin\SeoController@product_seo_destroy')->name('admin.delete.product.seo');
    //Google analytics
    Route::get('google-analytic/edit','Admin\GoogleAnalyticsController@edit')->name('admin.edit.google.analytic');
    Route::post('google-analytic/update','Admin\GoogleAnalyticsController@update')->name('admin.update.google.analytic');
    //up_sales
    Route::get('/up-sales','Admin\UpSaleController@index')->name('admin.upsales');
    Route::get('/up-sale/create','Admin\UpSaleController@create')->name('admin.upsale.create');
    Route::post('/up-sale/store','Admin\UpSaleController@store')->name('admin.upsale.store');
    Route::get('/up-sales/{id}/edit','Admin\UpSaleController@edit')->name('admin.upsale.edit');
    Route::post('/up-sale/update','Admin\UpSaleController@update')->name('admin.upsale.update');
    Route::get('/up-sales/{id}/delete','Admin\UpSaleController@destroy')->name('admin.upsale.delete');
    //invoice
    Route::get('/{order_id}/invoice','Admin\InvoiceController@invoice')->name('admin.invoice');
    Route::get('/{order_id}/print-invoice','Admin\InvoiceController@print_invoice')->name('admin.print.invoice');
    //notifications
    Route::get('/notifications','Admin\NotificationController@index')->name('admin.notifications');
    Route::get('/notification/{id}/read-note-and-redirect','Admin\NotificationController@read_note_and_redirect')->name('admin.notification.read.note.and.redirect');
    //discounts
    Route::get('/products/discounts','Admin\DiscountsController@index')->name('admin.discounts');
    Route::get('/product/{id}/discount/create','Admin\DiscountsController@create')->name('admin.create.discount');
    Route::post('/product/discount/store','Admin\DiscountsController@store')->name('admin.discount.store');
    Route::get('/product/discount/{id}/edit','Admin\DiscountsController@edit')->name('admin.discount.edit');
    Route::post('/product/discount/update','Admin\DiscountsController@update')->name('admin.discount.update');
    Route::get('/product/discount/{id}/delete','Admin\DiscountsController@destroy')->name('admin.discount.destroy');
    //pages
    Route::get('/من-نحن','Admin\PagesController@about_us')->name('admin.about_us');
    Route::post('/من-نحن/update','Admin\PagesController@about_us_update')->name('admin.about_us.update');
    Route::get('/سياسة-خصوصية','Admin\PagesController@contra')->name('admin.contra');
    Route::post('/سياسة-خصوصية/update','Admin\PagesController@contra_update')->name('admin.contra.update');
    Route::get('/طريقة-تسليم-الطلبات','Admin\PagesController@how_to_ship')->name('admin.how_to_ship');
    Route::post('/طريقة-تسليم-الطلبات/update','Admin\PagesController@how_to_ship_update')->name('admin.how_to_ship.update');
    //setting route
    Route::get('setting','Admin\SettingController@index')->name('admin.setting');
    Route::post('setting/update','Admin\SettingController@update')->name('admin.setting.update');
});
//--------------------------------------------
//              user routes
//--------------------------------------------
Route::prefix('seller')->group(function(){
//logout
Route::post('/logout','Auth\LoginController@userlogout')->name('userlogout');
//
Route::get('/','Users\Seller\SellerController@index')->name('seller.index');
});
//-----------------home routes-----------------
Route::get('/home', 'HomeController@index')->name('home');
//--------------------------------------------
//              store routes
//--------------------------------------------
//test routes
Route::get('/test/send-normal-email','Store\TestController@create_normal_email')->name('test.send.normal.email');
Route::post('/test/send-normal-email','Store\TestController@send_normal_email')->name('test.send.normal.email.send');
Route::get('/test/send-cron-job-email','Store\TestController@create_cron_job_email')->name('test.send.cron.job.email');
Route::post('/test/send-cron-job-email','Store\TestController@send_cron_job_email')->name('test.send.cron.job.email.send');
//consumer routes
Route::prefix('consumer')->group(function(){
    //authontication
    Route::get('/login','Auth\ConsumerLoginController@ShowLoginForm')->name('consumer.login');
    Route::post('/login','Auth\ConsumerLoginController@login')->name('consumer.login.submit');
    Route::get('/logout','Auth\ConsumerLoginController@logout')->name('consumer.logout');
    Route::get('/register','Auth\ConsumerRegisterController@ShowRegisterForm')->name('consumer.register');
    Route::post('/register','Auth\ConsumerRegisterController@register')->name('consumer.register.submit');
    //dashboard (index)
    Route::get('/{id}/dashboard','Store\ConsumerController@index')->name('consumer.dashboard');
    // reset password
    Route::get('password/forget','Auth\ConsumerForgetPasswordController@ShowForgetPasswordForm')->name('consumer.forget.password');
    Route::post('password/reset','Auth\ConsumerResetPasswordController@ResetPassword')->name('consumer.reset.password');
});
//store
Route::get('/','Store\StoreController@index')->name('store');
//products
Route::get('/products', 'Store\ProductController@index')->name('products');
//find products
Route::get('/products/search', 'Store\ProductController@find_products')->name('store.product.find');
//shop by result
Route::get('/shop-by', 'Store\ProductController@shop_bay_result')->name('shop_by');
//
Route::get('/product/{slug}', 'Store\ProductController@product')->name('store.product.details');
//add to cart
Route::get('product/{product}/add-to-cart','Store\ProductController@addToCart')->name('cart.add');
Route::post('product/{product}/add-with-qty','Store\ProductController@addWithQty')->name('cart.addwithqty');
//updatqty
Route::post('product/{product}/updateqty','Store\ProductController@updateQty')->name('cart.update');
//remove from cart
Route::get('product/{product}/remove-from-cart','Store\ProductController@removeFromCart')->name('cart.remove');
//checkout
Route::get('/checkout','Store\CheckoutController@index')->name('checkout');
//show cart
Route::get('cart/','Store\ProductController@showCart')->name('cart.show');
//order
Route::post('order/create','Store\OrderController@create_order')->name('store.create.order');
//categories
Route::get('/products/category/{slug}', 'Store\ProductController@products_by_category')->name('store.products.by.category');
//sub categories
Route::get('/products/sub-category/{slug}', 'Store\ProductController@products_by_sub_category')->name('store.products.by.sub.category');;
//sub sub categories
Route::get('/products/sub-sub-category/{slug}', 'Store\ProductController@products_by_sub_sub_category')->name('store.products.by.sub.sub.category');;
//rating a product
Route::post('/rating/create','Store\RatingController@create')->name('store.create.rating');
//remove color from searcher session
Route::get('/searcher/color/{index}/delete','Store\SearcherSessionController@delete_color')->name('searcher.color.delete');
//remove size from searcher session
Route::get('/searcher/size/{index}/delete','Store\SearcherSessionController@delete_size')->name('searcher.size.delete');
//remove brand from searcher session
Route::get('/searcher/brand/{index}/delete','Store\SearcherSessionController@delete_brand')->name('searcher.brand.delete');
//remove min_price from searcher session
Route::get('/searcher/min-price/delete','Store\SearcherSessionController@delete_min_price')->name('searcher.min-price.delete');
//remove max_price from searcher session
Route::get('/searcher/max-price/delete','Store\SearcherSessionController@delete_max_price')->name('searcher.max-price.delete');
//add color for searcher session
Route::get('/searcher/color/{id}/add','Store\SearcherSessionController@add_color')->name('searcher.color.add');
//add size for searcher session
Route::get('/searcher/size/{id}/add','Store\SearcherSessionController@add_size')->name('searcher.size.add');
//add brand for searcher session
Route::get('/searcher/brand/{id}/add','Store\SearcherSessionController@add_brand')->name('searcher.brand.add');
//add min_price for searcher session
Route::get('/searcher/max-price/{max_price}/add','Store\SearcherSessionController@add_max_price')->name('searcher.max_price.add');
//add min_price for searcher session
Route::get('/searcher/min-price/{min_price}/add','Store\SearcherSessionController@add_min_price')->name('searcher.min_price.add');
//forget searcher session
Route::get('/searcher/forget','Store\SearcherSessionController@forget_searcher')->name('searcher.forget');
//get searcher pragnation
Route::get('/searcher/get_pagination','Store\SearcherSessionController@get_pagination')->name('searcher.get_pagination');
//wish list route
Route::get('/consumer/wish-list','Store\ConsumerController@wish_list')->name('consumer.wish_list');
//compar list route
Route::get('/consumer/compar-list','Store\ConsumerController@compar_list')->name('consumer.compar_list');
//add to wish list route
Route::get('/consumer/wish-list/add/{product_id}','Store\ConsumerController@add_to_wish_list')->name('consumer.wish_list.add');
//add to compar list route
Route::get('/consumer/compar-list/add/{product_id}','Store\ConsumerController@add_to_compar_list')->name('consumer.compar_list.add');
//edit consumer account
Route::get('/consumer/{consumer_id}/edit-account','Store\ConsumerController@edit_account')->name('consumer.edit.account');
//update consumer account
Route::post('/consumer/update-account','Store\ConsumerController@update_account')->name('consumer.update.account');
//edit consumer password
Route::get('/consumer/{consumer_id}/edit-password','Store\ConsumerController@edit_password')->name('consumer.edit.password');
//update consumer password
Route::post('/consumer/update-password','Store\ConsumerController@update_password')->name('consumer.update.password');
//consumer orders
Route::get('/consumer/{consumer_id}/orders','Store\ConsumerController@orders')->name('consumer.orders');
//consumer order-details
Route::get('/consumer/order/{id}','Store\ConsumerController@order_details')->name('consumer.order-details');
//load-dis-products
Route::get('/load-dis-products/{id}','Store\StoreController@dis_products');
//about us
Route::get('/من-نحن','Store\PagesController@about_us')->name('about_as');
//contra
Route::get('/سياسة-خصوصية','Store\PagesController@contra')->name('contra');
//how_to_ship
Route::get('/طريقة-تسليم-الطلبات','Store\PagesController@how_to_ship')->name('how_to_ship');
//contact us
Route::get('/إتصل_بنا','Store\PagesController@contact_us')->name('contact_us');
//contact us store
Route::post('/إتصل_بنا/create','Store\PagesController@contact_us_store')->name('contact_us.store');
//faq
Route::get('/أسئلة-شائعة','Store\PagesController@faq')->name('faq');
//faq store
Route::post('/أسئلة-شائعة/create','Store\PagesController@faq_store')->name('faq.store');
//create email list
Route::post('/email_list/create','Store\PagesController@email_list_store')->name('email_list.store');