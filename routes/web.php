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
    if(auth()->user()){
        return redirect()->route('start');
    }else{
        return view('auth.login');
    }
});

// Authentication
Auth::routes(['register' => false]);

// Admin Panel
Route::group(['prefix' => 'system'], function () {
    Route::get('/', 'Auth\Panel\DashboardController@index')->name('start');

    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Auth\Panel\UsersController@index')->name('users');
        Route::get('/add', 'Auth\Panel\UsersController@add')->name('users_add');
        Route::get('/edit/{id}', 'Auth\Panel\UsersController@edit')->name('users_edit')->where('id', '[0-9]+');
        Route::post('/edit/{id?}', 'Auth\Panel\UsersController@update')->name('users_update')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'Auth\Panel\UsersController@delete')->name('users_delete')->where('id', '[0-9]+');
    });

    // Companies
    Route::group(['prefix' => 'companies'], function () {
        Route::get('/', 'Auth\Panel\CompaniesController@index')->name('companies');
        Route::get('/add', 'Auth\Panel\CompaniesController@add')->name('companies_add');
        Route::get('/edit/{id}', 'Auth\Panel\CompaniesController@edit')->name('companies_edit')->where('id', '[0-9]+');
        Route::post('/edit/{id?}', 'Auth\Panel\CompaniesController@update')->name('companies_update')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'Auth\Panel\CompaniesController@delete')->name('companies_delete')->where('id', '[0-9]+');
    });

    // Positions
    Route::group(['prefix' => 'positions'], function () {
        Route::get('/', 'Auth\Panel\PositionsController@index')->name('positions');
        Route::get('/add', 'Auth\Panel\PositionsController@add')->name('positions_add');
        Route::get('/edit/{id}', 'Auth\Panel\PositionsController@edit')->name('positions_edit')->where('id', '[0-9]+');
        Route::post('/edit/{id?}', 'Auth\Panel\PositionsController@update')->name('positions_update')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'Auth\Panel\PositionsController@delete')->name('positions_delete')->where('id', '[0-9]+');
    });
});
