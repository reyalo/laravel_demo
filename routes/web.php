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
Route::get('/product/{id}', 'FrontendController@singleProduct')->name('singleProduct');
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

//! Admin Panel  ->rgrm


Route::group(['middleware' => ['auth', 'verified']], function () {


  Route::get('/admin', 'AdminController@index')->name('dashboard');

  Route::get('category_add', 'CategoryController@create')->name('addCategory');
  Route::post('category_store', 'CategoryController@store')->name('storeCategory');
  Route::get('category_manage', 'CategoryController@index')->name('manageCategory');
  Route::get('category_active/{id}', 'CategoryController@active')->name('activeCategory');
  Route::get('category_edit/{id}', 'CategoryController@edit')->name('editCategory');
  Route::post('category_update', 'CategoryController@update')->name('updateCategory');
  Route::get('category_delete/{id}', 'CategoryController@destroy')->name('deleteCategory');

  Route::get('brand/add', 'BrandController@create')->name('addBrand');
  Route::post('brand/store', 'BrandController@store')->name('storeBrand');
  Route::get('brand/manage', 'BrandController@index')->name('manageBrand');
  Route::get('brand/active/{id}', 'BrandController@active')->name('activeBrand');
  Route::get('brand/edit/{id}', 'BrandController@edit')->name('editBrand');
  Route::post('brand/update', 'BrandController@update')->name('updateBrand');
  Route::get('brand/delete/{id}', 'BrandController@destroy')->name('deleteBrand');

  Route::get('product_add', 'ProductController@create')->name('addProduct');
  Route::post('product_store', 'ProductController@store')->name('storeProduct');
  Route::get('product_manage', 'ProductController@index')->name('manageProduct');
  Route::get('product_active/{id}', 'ProductController@active')->name('activeProduct');
  Route::get('product_edit/{id}', 'ProductController@edit')->name('editProduct');
  Route::post('product_update', 'ProductController@update')->name('updateProduct');
  Route::get('product_delete/{id}', 'ProductController@destroy')->name('deleteProduct');

  Route::get('order/manage', 'OrderController@index')->name('manageOrder');
  Route::get('order/delete', 'OrderController@destroy')->name('deleteOrder');
  Route::get('order/view-order/{id}', 'OrderController@viewOrder')->name('viewOrder');
  Route::get('order/view-invoice/{id}', 'OrderController@invoiceOrder')->name('invoiceOrder');
  Route::get('order/invoice-download/{id}', 'OrderController@invoicePrint')->name('invoiceDownload');
});












































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
