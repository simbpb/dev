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

Route::get('/', 'HomeController@index');
/** Routes for Auths **/
Route::any('/si-bpb/login', 'Auth\BpbController@login')->name('bpb.login');
Route::any('/si-hsbgn/login', 'Auth\HsbgnController@login')->name('hsbgn.login');
Route::any('/si-perdabg/login', 'Auth\PerdabgController@login')->name('perdabg.login');
/** end Auths **/

/** for si-bpb users **/
Route::group(['prefix' => 'si-bpb', 'middleware' => 'auth:bpb'], function () {
    Route::any('/', 'Auth\BpbController@index');
    Route::any('/logout', 'Auth\BpbController@logout');

    Route::group(['prefix' => 'user-bpb'], function () {
        Route::get('/', 'UserBpbController@index');
        Route::get('/{id}/view', 'UserBpbController@view');
        Route::any('/create', 'UserBpbController@create');
        Route::any('/{id}/edit', 'UserBpbController@edit');
        Route::get('/{id}/delete', 'UserBpbController@delete');
    });

    Route::group(['prefix' => 'user-hsbgn'], function () {
        Route::get('/', 'UserHsbgnController@index');
        Route::get('/{id}/view', 'UserHsbgnController@view');
        Route::any('/create', 'UserHsbgnController@create');
        Route::any('/{id}/edit', 'UserHsbgnController@edit');
        Route::get('/{id}/delete', 'UserHsbgnController@delete');
    });

    Route::group(['prefix' => 'user-perdabg'], function () {
        Route::get('/', 'UserPerdabgController@index');
        Route::get('/{id}/view', 'UserPerdabgController@view');
        Route::any('/create', 'UserPerdabgController@create');
        Route::any('/{id}/edit', 'UserPerdabgController@edit');
        Route::get('/{id}/delete', 'UserPerdabgController@delete');
    });

    Route::group(['prefix' => 'struktur-program'], function () {
        Route::get('/', 'StrukturProgramController@index');
        Route::get('/{id}/view', 'StrukturProgramController@view');
        Route::any('/create', 'StrukturProgramController@create');
        Route::any('/{id}/edit', 'StrukturProgramController@edit');
        Route::get('/{id}/delete', 'StrukturProgramController@delete');
    });
});

/** for si-hsbgn users **/
Route::group(['prefix' => 'si-hsbgn', 'middleware' => 'auth:hsbgn'], function () {
    Route::any('/', 'Auth\HsbgnController@index');
    Route::any('/logout', 'Auth\HsbgnController@logout');
});

/** for si-perdabg users **/
Route::group(['prefix' => 'si-perdabg', 'middleware' => 'auth:perdabg'], function () {
    Route::any('/', 'Auth\PerdabgController@index');
    Route::any('/logout', 'Auth\PerdabgController@logout');
});


