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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/ober', 'HomeController@ober');

Route::get('/product', 'HomeController@product');

Route::get('/changeToReady', 'OrderController@changeToReady');

Route::get('/changeToToDo', 'OrderController@changeToToDo');

Route::get('/changeToDone', 'OrderController@changeToDone');

Route::post('/addproduct', 'ProductController@addproduct');
Route::get('/delete/{id}', 'ProductController@delete');
