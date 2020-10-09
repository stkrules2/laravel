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

/*User Routes */


/*Admin Routes */

Route::get('/admin', 'AdminController@index');
Route::get('/admin/menu', 'CategoryController@index');
Route::post('/admin/category/insert', 'CategoryController@insert');
Route::post('/admin/category/edit', 'CategoryController@edit');
Route::get('/admin/category/delete/{id}', 'CategoryController@delete');
Route::get('/admin/dish/delete/{id}', 'DishController@delete');
Route::get('/admin/dish/delete/image/{id}{id2}', 'DishController@deleteImage');
Route::get('/admin/promotion/delete/{id}', 'PromotionController@delete');
Route::get('/admin/history/delete/{id}', 'HistoryController@delete');
Route::get('/admin/banner/delete/{id}', 'BannerController@delete');
Route::post('/admin/dish/insert', 'DishController@index');
Route::get('/admin/dish/edit', 'DishController@edit');
Route::post('/admin/dish/edit/form', 'DishController@editform');
Route::get('/admin/dish/dishes', 'DishController@dishes');
Route::get('/admin/banner', 'BannerController@index');
Route::post('/admin/banner/insert', 'BannerController@insert');
Route::post('/admin/history/insert', 'HistoryController@insert');
Route::post('/admin/promotion/insert', 'PromotionController@insert');
Route::get('/admin/history', 'HistoryController@index');
Route::get('/admin/promotion', 'PromotionController@index');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/profile', 'AdminController@profile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setting', 'HomeController@setting')->name('setting');
Route::get('/account', 'HomeController@account')->name('my-account');
Route::get('/password', 'HomeController@password')->name('password');
Route::get('/address', 'HomeController@address')->name('address');
Route::get('/new/address', 'HomeController@new_address')->name('new_address');
Route::get('/wishlist', 'HomeController@wishlist')->name('wishlist');
Route::get('/order', 'HomeController@order')->name('order');
Route::get('/mycart', 'HomeController@mycart')->name('mycart');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::get('/transaction', 'HomeController@transaction')->name('transaction');
Route::get('/newsletter', 'HomeController@newsletter')->name('newsletter');
Route::post('/dishes/show', 'HomeController@showDishes')->name('showdishes');