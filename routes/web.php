<?php

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Resources
Route::resource('members', 'MemberController')->middleware('auth');
Route::resource('distributors', 'DistributorController')->middleware('auth');
Route::resource('sales', 'SaleController')->middleware('auth');

// Post
Route::post('members/search', 'MemberController@search')->middleware('auth');
Route::post('members/check', 'MemberController@check')->middleware('auth');
Route::post('sales/generate-computation', 'SaleController@generateComputation')->middleware('auth');
Route::post('sales/validate', 'SaleController@validateSaleForm')->middleware('auth');

// Get
Route::get('sales/my-sales/all', 'SaleController@getMySales')->middleware('auth');  
Route::get('sales/get-sales-orders/{sales_id}', 'SaleController@getSalesOrders')->middleware('auth');  
Route::get('product_categories/get-products/{category_id}', 'ProductCategoryController@getProducts')->middleware('auth'); 