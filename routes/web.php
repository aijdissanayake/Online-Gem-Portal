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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//admin routes
Route::group(['middleware' => 'admin'], function () {
});
//shop routes
Route::group(['middleware' => 'shop'], function () {
});
//buyer routes
Route::group(['middleware' => 'buyer'], function () {
});

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin/home', function(){ return view('admin/home');});
// Route::get('/shop/home', function(){ return view('shop/home');});
// Route::get('/buyer/home', function(){ return view('buyer/home');});