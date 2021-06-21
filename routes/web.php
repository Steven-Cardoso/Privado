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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//->prefix('admin') mudei isso
Route::namespace('Admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/addMenuItem', 'HomeController@index2');//funcionou
    //Route::get('/restaurants', 'RestaurantController@index')->name('restos');
    Route::get('/restaurants/menu','MenuController@index')->name('restos.menu');
    Route::get('/orders','RestaurantOrderController@index')->name('pedidos');
    Route::get('/addOrder','RestaurantOrderController@add')->name('resto.orders.add');
    
});
