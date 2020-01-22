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
Route::resource('products', 'ProductController')->middleware('auth');
Route::resource('purchases', 'PurchaseController')->middleware('auth');
Route::resource('perks', 'PerkController')->middleware('auth');
Route::resource('commissions', 'CommissionController')->middleware('auth');

// Post
Route::post('members/search', 'MemberController@search')->middleware('auth');
Route::post('members/check', 'MemberController@check')->middleware('auth');
Route::post('sales/compute', 'SaleController@generateComputation')->middleware('auth');
Route::post('sales/validate', 'SaleController@validateSaleForm')->middleware('auth');

// Get
Route::get('members/{member_id}/profile', ['as' => 'member.profile', 'uses' => 'MemberController@showProfile'])->middleware('auth');
Route::get('members/{user_id}/sales', 'MemberController@getSales')->middleware('auth');
Route::get('sales/{sale_id}/sales_orders', 'SaleController@getSalesOrders')->middleware('auth');    
Route::get('product_categories/{category_id}/products', 'ProductCategoryController@getProducts')->middleware('auth');
Route::get('cs/products', 'ProductController@getProducts')->middleware('auth');