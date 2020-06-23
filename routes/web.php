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

Route::get('/', 'Site\SiteController@index')->name('welcome');

Route::get('/add', 'Admin\InventController@index')->name('adicionar');

Route::post('/add', 'Admin\InventController@add')->name('add');

Route::get('/edit/{id}', 'Admin\InventController@edit')->name('edit');

Route::post('/update/{id}', 'Admin\InventController@updateItem')->name('update');

Route::post('/delete/{id}', 'Admin\InventController@delete')->name('delete');

Route::post('/search', 'Admin\InventController@search')->name('search');

Route::post('/addType', 'Admin\InventController@addType')->name('addType');

Auth::routes();

Route::get('/home', 'Admin\AdminController@index')->name('home')->middleware('auth');
