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
Route::post('master-data/category','Admin\CategoryController@store')->name('category.save');
Route::delete('master-data/category/{id}','Admin\CategoryController@destroy')->name('category.delete');
Route::post('master-data/category/{id}','Admin\CategoryController@update')->name('category.update'); 
#endregion

#region Sub Kategori
Route::get('master-data/subcategory','Admin\SubcategoryController@index')->name('subcategory');
Route::get('master-data/subcategory/displayData','Admin\SubcategoryController@display')->name('subcategory.displayData');
Route::get('master-data/subcategory/{id}','Admin\SubcategoryController@edit')->name('subcategory.edit');
Route::post('master-data/subcategory','Admin\SubcategoryController@store')->name('subcategory.save');
Route::delete('master-data/subcategory/{id}','Admin\SubcategoryController@destroy')->name('subcategory.delete');
Route::post('master-data/subcategory/{id}','Admin\SubcategoryController@update')->name('subcategory.update'); 
#endregion

#region Products
Route::get('master-data/product','Admin\ProductController@index')->name('product');
Route::get('master-data/product/displayData','Admin\ProductController@display')->name('product.displayData');
Route::get('master-data/product/{id}','Admin\ProductController@edit')->name('product.edit');
Route::post('master-data/product','Admin\ProductController@store')->name('product.save');
Route::delete('master-data/product/{id}','Admin\ProductController@destroy')->name('product.delete');
Route::post('master-data/product/{id}','Admin\ProductController@update')->name('product.update'); 
#endregion

