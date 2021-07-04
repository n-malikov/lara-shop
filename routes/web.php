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

Auth::routes([
    'reset'   => false, // обрезаем лишние функции
    'confirm' => false, // два раза shift для поиска классов
    'verify'  => false,
]);
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout'); // ВМЕСТЕ С ПУТЕМ!

//Route::group(['middleware' => 'auth'], function () {
Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
], function () {
    // auth можно глянуть в /app/Http/Kernel.php
    Route::get('/orders', 'OrderController@index')->name('home');
});

Route::get('/', 'MainController@index')->name('index');
Route::get('/shop', 'MainController@shop')->name('shop');

Route::get('/basket', 'BasketController@basket')->name('basket');
Route::get('/basket/place', 'BasketController@basketPlace')->name('basket-place');
Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
Route::post('/basket/place', 'BasketController@basketConfirm')->name('basket-confirm'); // подтверждение заказа

Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product?}', 'MainController@product')->name('product');


//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
