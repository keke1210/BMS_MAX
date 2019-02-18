<?php

use Illuminate\Http\Request;
use App\Order;
use App\Http\Resources\OrderResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::apiResource('products','API\ProductsController');
Route::post('details', 'API\UserController@details');

Route::group(['middleware' => 'auth:api'], function(){
    
    //Route::post('details', 'API\UserController@details');
   // Route::apiResource('products','API\ProductsController');

    Route::get('orders', 'API\OrdersController@index');
    Route::post('orders', 'API\OrdersController@store');
    Route::get('orders/{id}', 'API\OrdersController@show');
    Route::delete('orders/{id}', 'API\OrdersController@destroy');
    Route::put('orders/{id}', 'API\OrdersController@update');
   
});
