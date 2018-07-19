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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => config('app.auth_page'), 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/profile', 'Auth\ProfileController@index');
    Route::any('/change-password', 'Auth\ProfileController@changePassword');
    
    Route::group(['prefix' => 'ajax', 'middleware' => 'auth'], function () {
    	Route::get('/cities/{provinceId}', 'Ajax\LocationsController@cities');
    	Route::get('/suboutput/{outputId}', 'Ajax\MasterController@suboutput');
    	Route::get('/sasaran/{suboutputId}', 'Ajax\MasterController@sasaran');
    	Route::get('/volume/{outputId}', 'Ajax\MasterController@volume');
    });
    
    Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
	    Route::get('/', 'UsersController@index')->middleware('permission:users_view');
	    Route::get('/{id}/view', 'UsersController@view')->middleware('permission:users_view');
	    Route::any('/create', 'UsersController@create')->middleware('permission:users_create');
	    Route::any('/{id}/edit', 'UsersController@edit')->middleware('permission:users_edit');
	    Route::delete('/{id}/delete', 'UsersController@delete')->middleware('permission:users_delete');
	});

	Route::group(['prefix' => 'roles', 'middleware' => 'auth'], function () {
	    Route::get('/', 'RolesController@index')->middleware('permission:roles_view');
	    Route::get('/{id}/view', 'RolesController@view')->middleware('permission:roles_view');
	    Route::any('/create', 'RolesController@create')->middleware('permission:roles_create');
	    Route::any('/{id}/edit', 'RolesController@edit')->middleware('permission:roles_edit');
	    Route::delete('/{id}/delete', 'RolesController@delete')->middleware('permission:roles_delete');
	});

	Route::group(['prefix' => 'menus', 'middleware' => 'auth'], function () {
	    Route::get('/', 'MenusController@index')->middleware('permission:menus_view');
	    Route::get('/{id}/view', 'MenusController@view')->middleware('permission:menus_view');
	    Route::any('/create', 'MenusController@create')->middleware('permission:menus_create');
	    Route::any('/{id}/edit', 'MenusController@edit')->middleware('permission:menus_edit');
	    Route::delete('/{id}/delete', 'MenusController@delete')->middleware('permission:menus_delete');
	});

	Route::group(['prefix' => 'permissions', 'middleware' => 'auth'], function () {
	    Route::get('/', 'PermissionsController@index')->middleware('permission:permissions_view');
	    Route::get('/{id}/view', 'PermissionsController@view')->middleware('permission:permissions_view');
	    Route::any('/create', 'PermissionsController@create')->middleware('permission:permissions_create');
	    Route::any('/{id}/edit', 'PermissionsController@edit')->middleware('permission:permissions_edit');
	    Route::delete('/{id}/delete', 'PermissionsController@delete')->middleware('permission:permissions_delete');
	});
	/** Controllers Master **/
		Route::group(['prefix' => 'output', 'middleware' => 'auth'], function () {
		    Route::get('/', 'Master\OutputController@index')->middleware('permission:output_view');
		    Route::get('/{id}/view', 'Master\OutputController@view')->middleware('permission:output_view');
		    Route::any('/create', 'Master\OutputController@create')->middleware('permission:output_create');
		    Route::any('/{id}/edit', 'Master\OutputController@edit')->middleware('permission:output_edit');
		    Route::delete('/{id}/delete', 'Master\OutputController@delete')->middleware('permission:output_delete');
		});

		Route::group(['prefix' => 'suboutput', 'middleware' => 'auth'], function () {
		    Route::get('/', 'Master\SubOutputController@index')->middleware('permission:suboutput_view');
		    Route::get('/{id}/view', 'Master\SubOutputController@view')->middleware('permission:suboutput_view');
		    Route::any('/create', 'Master\SubOutputController@create')->middleware('permission:suboutput_create');
		    Route::any('/{id}/edit', 'Master\SubOutputController@edit')->middleware('permission:suboutput_edit');
		    Route::delete('/{id}/delete', 'Master\SubOutputController@delete')->middleware('permission:suboutput_delete');
		});

		Route::group(['prefix' => 'sasaran', 'middleware' => 'auth'], function () {
		    Route::get('/', 'Master\SasaranController@index')->middleware('permission:sasaran_view');
		    Route::get('/{id}/view', 'Master\SasaranController@view')->middleware('permission:sasaran_view');
		    Route::any('/create', 'Master\SasaranController@create')->middleware('permission:sasaran_create');
		    Route::any('/{id}/edit', 'Master\SasaranController@edit')->middleware('permission:sasaran_edit');
		    Route::delete('/{id}/delete', 'Master\SasaranController@delete')->middleware('permission:sasaran_delete');
		});

		Route::group(['prefix' => 'volume', 'middleware' => 'auth'], function () {
		    Route::get('/', 'Master\VolumeController@index')->middleware('permission:volume_view');
		    Route::get('/{id}/view', 'Master\VolumeController@view')->middleware('permission:volume_view');
		    Route::any('/create', 'Master\VolumeController@create')->middleware('permission:volume_create');
		    Route::any('/{id}/edit', 'Master\VolumeController@edit')->middleware('permission:volume_edit');
		    Route::delete('/{id}/delete', 'Master\VolumeController@delete')->middleware('permission:volume_delete');
		});
	/** End controllers Master**/
	Route::group(['prefix' => 'program', 'middleware' => 'auth'], function () {
	    Route::get('/', 'ProgramController@index')->middleware('permission:program_view');
	    Route::get('/{id}/view', 'ProgramController@view')->middleware('permission:program_view');
	    Route::any('/create', 'ProgramController@create')->middleware('permission:program_create');
	    Route::any('/{id}/edit', 'ProgramController@edit')->middleware('permission:program_edit');
	    Route::delete('/{id}/delete', 'ProgramController@delete')->middleware('permission:program_delete');
	});
});
