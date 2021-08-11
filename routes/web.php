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
    // auth можно глянуть в /app/Http/Kernel.php
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    // is_admin так же в Kernel.php
    Route::group(['middleware' => 'is_admin'], function (){
        Route::get('/orders', 'OrderController@index')->name('home');
    });
    // редактирование категорий
    Route::resource('categories', 'CategoryController');

    // Route::post(); - так мы можем добавить маршрут для POST данных, если нужно
});

Route::get('/', 'MainController@index')->name('index');
Route::get('/shop', 'MainController@shop')->name('shop');

// работа с корзиной
Route::group(['prefix' => 'basket'], function () { // префиксом облегчаем код

    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');

    Route::group(['middleware' => 'basket_not_empty'], function () {
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
        Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm'); // подтверждение заказа
    });

});

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
