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

Route::get('/test', function () {
	$shop = App\Shop::find(1);
	$urls = [
	str_replace(' ', '-',"https://place-hold.it/800x300/aaa/white&text=" . $shop->user->name . "&fontsize=30"),
	str_replace(' ', '-',"https://place-hold.it/800x300/aaa/white&text=0" . $shop->user->tel . "&fontsize=30"),
	str_replace(' ', '-',"https://place-hold.it/800x300/aaa/white&text=" . $shop->user->email . "&fontsize=30")
	] ;
    return view('new3')->with('shop', $shop)
    				  ->with('urls', $urls);
});


Auth::routes();

//auth routes
Route::group(['middleware' => 'auth'], function () {

	//admin routes
	Route::group(['middleware' => 'admin'], function () {

		Route::get('/admin/all-buyers',function () {
	    	return view('admin/buyers');
		})->name('all_buyers');

		Route::get('/admin/all-shops',function () {
	    	return view('admin/shops');
		})->name('all_shops');

		Route::get('/admin/all-gems',function () {
	    	return view('admin/gems');
		})->name('all_gems');

		Route::get('/admin/dash-board',function () {
	    	return view('admin/dashboard');
		})->name('admin_dash_board');

		Route::get('/admin/all-posts',function () {
	    	return view('admin/posts');
		})->name('all_posts');

		Route::get('/admin/de-activate/{id}','UserController@deActivate')->name('de_activate');

		Route::post('/admin/create-post','AdminController@createPost')->name('create_post');

		Route::get('/admin/update-post/{id}','AdminController@viewUpdatePost')->name('view_update_post');

		Route::post('/admin/update-post','AdminController@updatePost')->name('update_post');

		Route::get('/admin/de-activate-post/{id}','AdminController@deActivatePost')->name('de_activate_post');


	});

	//shop routes
	Route::group(['middleware' => 'shop'], function () {

		Route::get('/shop/add-details','ShopController@addDetails')->name('add_details');

		Route::get('/shop/advertise','ShopController@advertiseForm')->name('advertise_form');

		Route::post('/shop/advertisement','ShopController@advertise')->name('advertise');

		Route::get('/shop/gem-stone/update/{id}','ShopController@viewUpdateGemStone')->name('view_update_gem_stone');

		Route::post('/shop/gem-stone/update/{id}','ShopController@updateGemStone')->name('update_gem_stone');

		Route::get('/shop/gem-stone/delete/{shop_id}/{id}','ShopController@deleteGemStone')->name('delete_gem_stone');

		Route::get('/shop/gem-stone/de-activate/{id}','ShopController@deActivateGemStone')->name('de_activate_gem_stone');



		//ajax routes
		Route::get('/shop/add-type','ShopController@addType')->name('add_type');
		Route::get('/shop/remove-type','ShopController@removeType')->name('remove_type');
		Route::get('/shop/add-size','ShopController@addSize')->name('add_size');
		Route::get('/shop/remove-size','ShopController@removeSize')->name('remove_size');
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

	Route::get('/visit-shop/{id}','ShopController@visitShop')->name('visit_shop');

	Route::get('/shop/download-gem-image/{id}','ShopController@getImage')->name('get_image');

	Route::get('/search/gems','ShopController@searchGems')->name('search_gems');

	Route::get('/gem-stone/{id}','ShopController@gemStone')->name('gem_stone');
	
});

// Route::get('/admin/home', function(){ return view('admin/home');});
// Route::get('/shop/home', function(){ return view('shop/home');});
// Route::get('/buyer/home', function(){ return view('buyer/home');});