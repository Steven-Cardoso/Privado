<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:api']], function() {
       Route::post('/resto', 'RestaurantController@store');
       Route::post('/resto/menu', 'MenuController@getRestoMenu');
       Route::post('/menu/remove', 'MenuController@remove');// ainda a fazer
       Route::post('/menu/edit', 'MenuController@edit');
       Route::post('/order/save', 'RestaurantOrderController@store');
       Route::post('/order/complete', 'RestaurantOrderController@complete');
       Route::post('/order/remove', 'RestaurantOrderController@remove');
       Route::post('/order/paid', 'RestaurantOrderController@paid');
       Route::post('/order/mail', 'RestaurantOrderController@mail');
       Route::post('/order/sms', 'RestaurantOrderController@sms');
       Route::get('/order', 'RestaurantOrderController@index2');
});
Route::post('item/save','MenuController@saveMenuItem');
