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

Route::get('/', 'HomeController@index');

/*Admin Routes */

Route::get('/admin', 'AdminController@index');
Route::get('/admin/menu', 'CategoryController@index');
Route::post('/admin/category/insert', 'CategoryController@insert');
Route::post('/admin/category/edit', 'CategoryController@edit');
Route::get('/admin/category/delete/{id}', 'CategoryController@delete');
Route::post('/admin/dish/insert', 'DishController@index');
Route::get('/admin/dish/edit', 'DishController@edit');
Route::post('/admin/dish/edit/form', 'DishController@editform');
Route::get('/admin/dish/dishes', 'DishController@dishes');
Route::get('/admin/banner', 'AdminController@banner');
Route::get('/admin/history', 'AdminController@history');
Route::get('/admin/promotion', 'AdminController@promotion');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/profile', 'AdminController@profile');