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



Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'], function () {

	Route::get('/', 'DashboardController@index')->name('admin.dashboard');

	Route::group(['prefix' => 'languages'], function() {

		Route::get('/', 'LanguagesController@index')->name('admin.languages.index');
		Route::get('create', 'LanguagesController@create')->name('admin.languages.create');
		Route::post('store', 'LanguagesController@store')->name('admin.languages.store');


		Route::get('edit/{id}', 'LanguagesController@edit')->name('admin.languages.edit');
		Route::post('update/{id}', 'LanguagesController@update')->name('admin.languages.update');

		Route::get('delete/{id}', 'LanguagesController@delete')->name('admin.languages.delete');

	});


    Route::group(['prefix' => 'main-categories'], function() {

		Route::get('/', 'MainCategoriesController@index')->name('admin.maincategories.index');
		Route::get('create', 'MainCategoriesController@create')->name('admin.maincategories.create');
		Route::post('store', 'MainCategoriesController@store')->name('admin.maincategories.store');


		Route::get('edit/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
		Route::post('update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');

		Route::get('delete/{id}', 'MainCategoriesController@delete')->name('admin.maincategories.delete');

		

	});

});


Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'], function () {
    Route::get('login','LoginController@getLogin')->name('get.admin.login');
    Route::post('login','LoginController@login')->name('admin.login');
});


Route::get('showfuc', function() {
	return get_default_lang();
});


