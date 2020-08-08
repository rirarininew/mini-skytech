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

//DASHBOARD
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	// POSTING ROUTE

	Route::get('posting', 'PostingController@index')->name('posting.index');

	Route::post('posting/storeposting', 'PostingController@store')->name ('posting.store');
	Route::get('posting/addposting', 'PostingController@create')->name('posting.create');

	Route::get('posting/editposting/{Post}/edit', 'PostingController@edit')->name ('posting.edit');
	Route::get('posting/detailposting/{Post}/detail', 'PostingController@detail')->name ('posting.detail');
	Route::put('posting/postingupdate/{Post}', 'PostingController@update')->name ('posting.update');
	Route::get('posting/deleteposting/{id}','PostingController@delete')->name ('posting.delete');
	Route::get('posting/cariposting', 'PostingController@cari')->name ('posting.cari');
	Route::get('posting/caripostingtgl', 'PostingController@caritgl')->name ('posting.caritgl');

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

