<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ADMIN
#region Kategori
Route::get('master-data/category','Admin\CategoryController@index')->name('category');
Route::get('master-data/category/displayData','Admin\CategoryController@display')->name('category.displayData');
Route::get('master-data/category/{id}','Admin\CategoryController@edit')->name('category.edit');
Route::get('master-data/category/get/dataCategory','Admin\CategoryController@getDataCategory')->name('category.getDataCategory');
Route::post('master-data/category','Admin\CategoryController@store')->name('category.save');
Route::delete('master-data/category/{id}','Admin\CategoryController@destroy')->name('category.delete');
Route::post('master-data/category/{id}','Admin\CategoryController@update')->name('category.update'); 
#endregion

#region Sub Kategori
Route::get('master-data/subcategory','Admin\SubcategoryController@index')->name('subcategory');
Route::get('master-data/subcategory/displayData','Admin\SubcategoryController@display')->name('subcategory.displayData');
Route::get('master-data/subcategory/{id}','Admin\SubcategoryController@edit')->name('subcategory.edit');
Route::get('master-data/subcategory/get/dataSubCategory/{id}','Admin\SubcategoryController@getDataSubCategoryByCategory')->name('subcategory.getDataSubCategoryByCategory');
Route::post('master-data/subcategory','Admin\SubcategoryController@store')->name('subcategory.save');
Route::delete('master-data/subcategory/{id}','Admin\SubcategoryController@destroy')->name('subcategory.delete');
Route::post('master-data/subcategory/{id}','Admin\SubcategoryController@update')->name('subcategory.update'); 
#endregion

#region Products
Route::get('master-data/product','Admin\ProductController@index')->name('product');
Route::get('master-data/product_stock','Admin\ProductController@product_stock')->name('product_stock');
Route::get('master-data/product/displayData','Admin\ProductController@display')->name('product.displayData');
Route::get('master-data/product/{id}','Admin\ProductController@edit')->name('product.edit');
Route::get('master-data/product/getProductById/{id}','Admin\ProductController@getProductById')->name('product.getProductById');
Route::post('master-data/product/getProductById/{id}','Admin\ProductController@updateStockProduct')->name('product.updateStockProduct');
Route::post('master-data/product','Admin\ProductController@store')->name('product.save');
Route::delete('master-data/product/{id}','Admin\ProductController@destroy')->name('product.delete');
Route::post('master-data/product/{id}','Admin\ProductController@update')->name('product.update'); 
#endregion





// TRANSACTION

#region Orders
Route::get('master-transaction/orders','Admin\OrderController@index')->name('order');
Route::get('master-transaction/order_detail/{id}','Admin\OrderController@order_details')->name('order_details');
Route::post('master-transaction/update_status/{id}','Admin\OrderController@update_status')->name('update_status');
#endregion


// REPORTS
Route::get('master-transaction/reports','Admin\ReportController@index')->name('reports');
Route::post('master-transaction/reports/{type}','Admin\ReportController@getReportByType')->name('getReportByType');

// CLIENT
Route::get('client/product','Client\ProductController@getAllProduct')->name('clientProduct');
// Route::get('client/product/{id}','Client\ProductController@getProductById')->name('getProductById');
Route::get('client/product-recomended','Client\ProductController@getRecomendedProduct')->name('clientRecomendedProduct');

// PRODUCT CLIENT
Route::post('client/transaction/manage_cart','Client\TransactionController@manageCart')->name('clientManageCart');
Route::post('client/transaction/checkout','Client\TransactionController@checkout')->name('clientCheckout');
// Route::post('client/transaction/order','Client\TransactionController@order')->name('clientOrder');




Route::get('vandhi','Client\HomeController@index')->name('homeClient');
Route::get('product/{id}','Client\ProductController@getProductById')->name('getProductById');
Route::get('cart','Client\CartController@cart')->name('cartClient');
Route::get('checkout','Client\CartController@checkout')->name('checkoutClient');
Route::get('order','Client\OrderController@order')->name('orderClient');
Route::get('order_details/{id}','Client\OrderController@orderDetails')->name('orderDetailsClient');
Route::get('shop','Client\ShopController@index')->name('shopClient');
Route::get('shop/category','Client\ShopController@shopCategory')->name('shopCategory');

// AUTH CLIENT
Route::post('client/auth/register','Client\AuthController@registerClient')->name('registerClient');
Route::post('client/auth/login','Client\AuthController@loginClient')->name('loginClient');
Route::post('client/auth/updateProfile','Client\AuthController@updateProfileClient')->name('updateProfileClient');
Route::get('client/auth/logout','Client\AuthController@logoutClient')->name('logoutClient');
Route::get('profile','Client\AuthController@profileClient')->name('profileClient');

Route::get('sign-in',function () {
    return view('client.auth.sign-in');
});

