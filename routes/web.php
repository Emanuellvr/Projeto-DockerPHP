<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'Site\SiteController@index')->name('home');

Route::get('/add', 'Admin\InventController@index')->name('adicionar')->middleware('auth:admin');
Route::post('/add', 'Admin\InventController@add')->name('add')->middleware('auth:admin');

Route::get('/edit/{id}', 'Admin\InventController@edit')->name('edit');
Route::post('/update/{id}', 'Admin\InventController@updateItem')->name('update');

Route::post('/delete/{id}', 'Admin\InventController@delete')->name('delete');

Route::post('/search', 'Site\SiteController@search')->name('search');
Route::post('/searchCart', 'Admin\UserController@searchCart')->name('search.cart');
Route::post('/searchAdmin', 'Admin\AdminController@searchAdmin')->name('search.admin');

Route::post('/addType', 'Admin\InventController@addType')->name('addType');

Auth::routes();

Route::post('/{id}', 'Admin\UserController@addToCart')->name('cart.add');
Route::get('/cart', 'Admin\UserController@showCart')->name('cart.show');
Route::post('/cart/{id}', 'Admin\UserController@removeFromCart')->name('cart.remove');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/admin', 'Admin\AdminController@home')->name('admin.home');

Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('logout');

Route::get('/admin/relatorio', 'Admin\PDFController@generatePDF')->name('relatorio');
Route::get('/admin/relatorioshow', 'Admin\PDFController@relatorio')->name('relatorio.show');
