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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('products/{category}/{subcategory}/{method}/{includeInactive?}', 'ProductController@index')->name('product');
Route::get('features/{productLineId}/{includeInactive?}', 'ProductController@getFeatures');
Route::get('clipart/{category}', 'ClipartController@index')->name('clipart');

Route::get('/{includeInactive?}', 'HomeController@index')->name('home');
