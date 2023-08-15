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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'master'],function(){
    //MasterBarang
    Route::get('index', 'BarangController@index')->name('master.index');
    Route::get('create', 'BarangController@create')->name('master.create');
    Route::post('store', 'BarangController@store')->name('master.store');
    Route::get('edit/{stuff}','BarangController@edit')->name('master.edit');
    Route::patch('update/{stuff}','BarangController@update')->name('master.update');
    Route::delete('delete/{stuff}','BarangController@destroy')->name('master.delete');
    
    //Cart
    Route::post('add-to-cart', 'CartController@addToCart')->name('store.add-to-cart');
    Route::get('list-cart', 'CartController@listcart')->name('list-cart');
    Route::post('cart','CartController@updatecart')->name('update.cart');
    Route::get('process-sale', 'CartController@checkout')->name('store.process.sale');
    Route::post('payment', 'CartController@processPayment')->name('store.payment');
    Route::get('invoice/{invoice}', 'CartController@createInvoice')->name('create.invoice');
});