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

//! Frontend Panel


Route::get('/', 'FrontendController@index')->name('home');
Route::get('/category/{id}', 'FrontendController@categoryProduct')->name('categoryProduct');
Route::get('/brand', 'FrontendController@brandProduct')->name('brandProduct');
Route::get('/cart', 'CartController@showCart')->name('cart');
Route::post('/cart/add', 'CartController@addCart')->name('addCart');
Route::get('/cart/show', 'CartController@showCart')->name('showCart');

Route::get('user/signup', 'AuthController@signup')->name('customerSignup');
Route::get('signup/form', 'AuthController@anySignup')->name('anySignup');
Route::get('user/login', 'AuthController@login')->name('customerLogin');
Route::get('login/form', 'AuthController@anyLogin')->name('Login');
Route::get('logout/form', 'AuthController@anyLogout')->name('Logout');
Route::get('cart/shipping', 'AuthController@shipping')->name('shipping');
Route::get('cart/payment', 'AuthController@payment')->name('payment');
Route::post('user/login/check', 'AuthController@checkLogin')->name('checkCustomerLogin');
Route::post('login/check', 'AuthController@checkAnyLogin')->name('checkAnyLogin');
Route::post('user/signup/save', 'AuthController@saveCustomerSignup')->name('saveCustomerSignup');
Route::post('signup/save', 'AuthController@saveAnySignup')->name('saveAnySignup');
Route::post('user/shipping/save', 'AuthController@saveShipping')->name('saveShipping');
Route::post('user/payment/save', 'AuthController@savePayment')->name('savePayment');

//! Admin Panel

Route::get('/admin', 'AdminController@index')->name('dashboard')->middleware('auth');

Route::get('category/add', 'CategoryController@create')->name('addCategory')->middleware('auth');
Route::post('category/store', 'CategoryController@store')->name('storeCategory')->middleware('auth');
Route::get('category/manage', 'CategoryController@index')->name('manageCategory')->middleware('auth');
Route::get('category/active/{id}', 'CategoryController@active')->name('activeCategory')->middleware('auth');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('editCategory')->middleware('auth');
Route::post('category/update', 'CategoryController@update')->name('updateCategory')->middleware('auth');
Route::get('category/delete/{id}', 'CategoryController@destroy')->name('deleteCategory')->middleware('auth');

Route::get('brand/add', 'BrandController@create')->name('addBrand')->middleware('auth');
Route::post('brand/store', 'BrandController@store')->name('storeBrand')->middleware('auth');
Route::get('brand/manage', 'BrandController@index')->name('manageBrand')->middleware('auth');
Route::get('brand/active/{id}', 'BrandController@active')->name('activeBrand')->middleware('auth');
Route::get('brand/edit/{id}', 'BrandController@edit')->name('editBrand')->middleware('auth');
Route::post('brand/update', 'BrandController@update')->name('updateBrand')->middleware('auth');
Route::get('brand/delete/{id}', 'BrandController@destroy')->name('deleteBrand')->middleware('auth');

Route::get('product/add', 'ProductController@create')->name('addProduct')->middleware('auth');
Route::post('product/store', 'ProductController@store')->name('storeProduct')->middleware('auth');
Route::get('product/manage', 'ProductController@index')->name('manageProduct')->middleware('auth');
Route::get('product/active/{id}', 'ProductController@active')->name('activeProduct')->middleware('auth');
Route::get('product/edit/{id}', 'ProductController@edit')->name('editProduct')->middleware('auth');
Route::post('product/update', 'ProductController@update')->name('updateProduct')->middleware('auth');
Route::get('product/delete/{id}', 'ProductController@destroy')->name('deleteProduct')->middleware('auth');

Route::get('order/manage', 'OrderController@index')->name('manageOrder')->middleware('auth');
Route::get('order/delete', 'OrderController@destroy')->name('deleteOrder')->middleware('auth');
Route::get('order/view-order/{id}', 'OrderController@viewOrder')->name('viewOrder')->middleware('auth');
Route::get('order/view-invoice/{id}', 'OrderController@invoiceOrder')->name('invoiceOrder')->middleware('auth');
Route::get('order/invoice-download/{id}', 'OrderController@invoicePrint')->name('invoiceDownload')->middleware('auth');














































Route::get('send-mail', function () {
  $details = [
    'title' => 'Mail from Dev TEster Electron',
    'body' => 'Here i have tried to send Mail To every one For Testing'
  ];
  Mail::to('cheetaof71@gmail.com')->send(new \App\Mail\MyTestMail($details));
  dd("Email is Sent.");
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
