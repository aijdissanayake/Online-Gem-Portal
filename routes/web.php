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


//non-auth routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//auth routes
Route::group(['middleware' => 'auth'], function () {

	//admin routes
	Route::group(['middleware' => 'admin'], function () {

		Route::get('/admin/de-activate/{id}','UserController@deActivate')->name('de_activate');

		Route::get('/admin/all-buyers',function () {
	    	return view('admin/buyers');
		})->name('all_buyers');

		Route::get('/admin/all-shops',function () {
	    	return view('admin/shops');
		})->name('all_shops');

	});

	//shop routes
	Route::group(['middleware' => 'shop'], function () {
		Route::get('/shop/add-details','ShopController@addDetails')->name('add_details');
	});

	//buyer routes
	Route::group(['middleware' => 'buyer'], function () {
	});



	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/update',function () {
		return view ('auth/update');
	})->name('update_view')->middleware('auth.basic');

	Route::get('/profile','UserController@viewProfile')->name('profile_view');

	Route::post('/update','UserController@updateUser')->name('update');

	Route::get('/visit-shops','ShopController@visitShops')->name('visit_shops');
	
});

// Route::get('/admin/home', function(){ return view('admin/home');});
// Route::get('/shop/home', function(){ return view('shop/home');});
// Route::get('/buyer/home', function(){ return view('buyer/home');});