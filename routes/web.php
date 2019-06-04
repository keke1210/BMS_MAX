<?php

use App\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
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
Route::get('/chart', function () {
    return view('chart-test');
});

Route::get('inventari', 'InventarController@index')->middleware('role:menaxher|admin');

Route::get('/kamarier', 'PagesController@kamarier')->middleware('role:kamarier|admin');
Route::get('/menaxher', 'PagesController@menaxher')->middleware('role:menaxher|admin');
Route::get('/ekonomist', 'PagesController@ekonomist')->middleware('role:ekonomist|admin');
Route::get('/admin','PagesController@admin')->middleware('role:admin');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products','ProductsController')->middleware('role:menaxher|admin');
Route::resource('users','UsersController')->middleware('role:menaxher|admin');
Route::resource('profile', 'ProfileController')->middleware('role:menaxher|admin|kamarier|ekonomist');

Route::get('orders','OrdersController@index')->middleware('role:kamarier|menaxher|admin');
Route::get('orders/create/{table}','OrdersController@create')->middleware('role:kamarier|menaxher|admin');
Route::post('orders','OrdersController@store')->middleware('role:kamarier|menaxher|admin');
Route::get('orders/{order}','OrdersController@show')->middleware('role:kamarier|ekonomist|menaxher|admin');

Route::view('produkte','produkte')->middleware('role:|menaxher|admin');
Route::post('produkte/post','ProdukteController@store')->middleware('role:menaxher|admin');
Route::get('produkte','ProdukteController@store')->middleware('role:menaxher|admin');

// Route::get('/tables','TableController@index')->middleware('role:kamarier|menaxher|admin');
// Route::get('tables/create','TableController@create')->middleware('role:kamarier|menaxher|admin');
// Route::post('tables','TableController@store')->middleware('role:kamarier|menaxher|admin');
// Route::get('tables/{table}','TableController@show')->middleware('role:kamarier|menaxher|admin');

Route::resource('tables','TableController')->middleware('role:kamarier|menaxher|admin');

// Route::get('/', );