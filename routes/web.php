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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

Route::get('/home/catalog', 'CatalogController@index')->name('catalog.index');
Route::get('/catalog/addcatalog', 'CatalogController@create')->name('catalog.create');
Route::get('/catalog/detailcatalog', 'CatalogController@detail')->name('catalog.detail');

Route::get('/home/stock', 'StockController@index')->name('stock.index');
Route::get('/stock/addstock', 'StockController@create')->name('stock.create');
Route::get('/stock/detailstock', 'StockController@detail')->name('stock.detail');

// POSTING ROUTE

	Route::get('/home/posting', 'PostingController@index')->name('posting.index');
	Route::get('/home/postingbysku', 'PostingController@carisku')->name('posting.carisku');
	Route::get('/home/postingbychannel', 'PostingController@carichannel')->name('posting.carichannel');
	Route::get('/home/postingbyuser', 'PostingController@cariuser')->name('posting.cariuser');
	

	Route::post('posting/storeposting', 'PostingController@store')->name ('posting.store');
	Route::get('posting/addposting', 'PostingController@create')->name('posting.create');

	Route::get('posting/editposting/{Post}/edit', 'PostingController@edit')->name ('posting.edit');
	Route::get('posting/detailposting/{Post}/detail', 'PostingController@detail')->name ('posting.detail');
	Route::put('posting/postingupdate/{Post}', 'PostingController@update')->name ('posting.update');
	Route::put('posting/postingupdateImage/{Post}', 'PostingController@updateImage')->name ('posting.updateimage');
	Route::get('posting/deleteposting/{id}','PostingController@delete')->name ('posting.delete');
	Route::get('posting/cariposting', 'PostingController@cari')->name ('posting.cari');
	Route::get('posting/caripostingtgl', 'PostingController@caritgl')->name ('posting.caritgl');

// USER ROUTE

	Route::get('/home/user', 'UserController@index')->name('user.index');
	Route::get('user/adduser', 'UserController@create')->name('user.create');
	Route::post('user/storeuser', 'UserController@store')->name ('user.store');
	Route::put('user/userupdate/{Post}', 'UserController@update')->name ('user.update');
	Route::get('user/edituser/{Post}/edit', 'UserController@edit')->name ('user.edit');
	Route::get('user/deleteuser/{id}','UserController@delete')->name ('user.delete');
