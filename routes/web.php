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
Route::get('/admin/menu', 'AdminController@menu');
Route::get('/admin/banner', 'AdminController@banner');
Route::get('/admin/history', 'AdminController@history');
Route::get('/admin/promotion', 'AdminController@promotion');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/profile', 'AdminController@profile');