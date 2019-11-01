<?php
// Fontend start

Route::get('/', 'pagesController@index')->name('index');
Route::get('/search', 'pagesController@search')->name('search');

Route::get('/products', 'pagesController@products')->name('products');
Route::get('/products/show/{slug}', 'pagesController@products_show')->name('product.show');
Route::get('/category/show{id}', 'CategoryController@caregory_show')->name('admin.categorys.show');
// Fontend end

// User start
Route::get('/user/dashboard', 'UserController@dashboard')->name('user.dashboard');
Route::get('/user/profile', 'UserController@Profile')->name('user.profile');
Route::post('/user/profile/update', 'UserController@updateProfile')->name('user.updateProfile');
// User end

//cart start
Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/store', 'CartController@cartStore')->name('cart.stote');
Route::post('/cart/update/{id}', 'CartController@cartUpdate')->name('cart.update');
Route::post('/cart/delete/{id}', 'CartController@cartDelete')->name('cart.delete');
//cart end

//checkouts start
Route::get('/checkouts', 'OrdersController@index')->name('checkouts');
Route::post('/checkouts/store', 'OrdersController@store')->name('checkouts.store');
//checkouts end

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'AdminPagesController@index')->name('admin.index');

	// Product start backend
	Route::get('/product', 'ProductController@product')->name('admin.product');
	Route::get('/product/create', 'ProductController@product_create')->name('admin.product_create');
	Route::post('/product/store', 'ProductController@product_store')->name('admin.product_store');
	Route::get('/product/edit/{id}', 'ProductController@product_edit')->name('admin.product.edit');
	Route::post('/product/update/{id}', 'ProductController@product_update')->name('admin.product.update');
	Route::post('/product/delete/{id}', 'ProductController@product_delete')->name('admin.product.delete');
	// Product End

	// Category start backend
	Route::get('/category', 'CategoryController@caregory')->name('admin.category');
	Route::get('/category/create', 'CategoryController@caregory_create')->name('admin.category.create');
	Route::post('/category/store', 'CategoryController@caregory_store')->name('admin.category.store');
	Route::get('/category/edit{id}', 'CategoryController@caregory_edit')->name('admin.category.edit');
	Route::post('/category/update{id}', 'CategoryController@caregory_update')->name('admin.category.update');
	Route::post('/category/delete{id}', 'CategoryController@caregory_delete')->name('admin.category.delete');
	
	// Category End

	// Brand start backend
	Route::get('/brand', 'BrandController@brand')->name('admin.brand');
	Route::get('/brand/create', 'BrandController@brand_create')->name('admin.brand.create');
	Route::post('/brand/store', 'BrandController@brand_store')->name('admin.brand.store');
	Route::get('/brand/edit/{id}', 'BrandController@brand_edit')->name('admin.brand.edit');
	Route::post('/brand/update/{id}', 'BrandController@brand_update')->name('admin.brand.update');
	Route::post('/brand/delete/{id}', 'BrandController@brand_delete')->name('admin.brand.delete');
	// Brand end backend

	// Orders start
	Route::get('/order', 'OrdersController@order')->name('admin.order');
	Route::get('/order/show{id}', 'OrdersController@order_show')->name('admin.order.show');
	Route::post('/order/complete{id}', 'OrdersController@order_complete')->name('admin.order.complete');
	Route::post('/order/paid{id}', 'OrdersController@order_paid')->name('admin.order.paid');
	Route::post('/charge-update{id}', 'OrdersController@chargeUpdate')->name('admin.order.charge');
	Route::get('/invoice{id}', 'OrdersController@InvoiceGenerate')->name('admin.order.invoice');
	// Orders end
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/token/{token}', 'VarificationController@varify')->name('user.varification');
