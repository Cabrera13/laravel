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
Route::get('/reduce/{id}', 'HomeController@getReduceByOne')->name('reduce');                       
Route::get('/remove/{id}', 'HomeController@getRemoveItem')->name('remove');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/book/{id}', 'HomeController@book')->name('book');
Route::get('/add-to-card/{id}', 'HomeController@addToCart')->name('add');
Route::get('/shoppingCart', 'HomeController@getCart')->name('shop');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@login' )->name('login');                       
Route::get('/register', '\App\Http\Controllers\Auth\LoginController@register')->name('register');                       
Route::get('/completed','HomeController@orderCompleted')->name('completed');                       

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'admin'],
    'namespace' => 'Admin'
], function() {
    CRUD::resource('book', 'BookCrudController');
    CRUD::resource('order', 'OrderCrudController');
    CRUD::resource('user', 'UserCrudController');
});
Auth::routes();

