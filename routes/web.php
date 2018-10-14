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
Route::group(['prefix' => config('app.auth_page')], function () {
	Auth::routes();
});

Route::group(['prefix' => config('app.auth_page'), 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/profile', 'Auth\ProfileController@index');
    Route::any('/change-password', 'Auth\ProfileController@changePassword');
    
    Route::group(['prefix' => 'ajax'], function () {
    	Route::get('/cities/{provinceId}', 'Ajax\LocationsController@cities');
    	Route::get('/districts/{provinceId}/{cityId}', 'Ajax\LocationsController@districts');
    	Route::get('/suboutput/{outputId}', 'Ajax\MasterController@suboutput');
    	Route::get('/sasaran/{suboutputId}', 'Ajax\MasterController@sasaran');
    	Route::get('/volume/{outputId}', 'Ajax\MasterController@volume');
    	Route::get('/uraian', 'Ajax\UraianController@detail_uraian');
    });
    
    Route::group(['prefix' => 'users'], function () {
	    Route::get('/', 'UsersController@index')->middleware('permission:users_view');
	    Route::get('/{id}/view', 'UsersController@view')->middleware('permission:users_view');
	    Route::any('/create', 'UsersController@create')->middleware('permission:users_create');
	    Route::any('/{id}/edit', 'UsersController@edit')->middleware('permission:users_edit');
	    Route::delete('/{id}/delete', 'UsersController@delete')->middleware('permission:users_delete');
	});

	Route::group(['prefix' => 'roles'], function () {
	    Route::get('/', 'RolesController@index')->middleware('permission:roles_view');
	    Route::get('/{id}/view', 'RolesController@view')->middleware('permission:roles_view');
	    Route::any('/create', 'RolesController@create')->middleware('permission:roles_create');
	    Route::any('/{id}/edit', 'RolesController@edit')->middleware('permission:roles_edit');
	    Route::delete('/{id}/delete', 'RolesController@delete')->middleware('permission:roles_delete');
	});

	Route::group(['prefix' => 'menus'], function () {
	    Route::get('/', 'MenusController@index')->middleware('permission:menus_view');
	    Route::get('/{id}/view', 'MenusController@view')->middleware('permission:menus_view');
	    Route::any('/create', 'MenusController@create')->middleware('permission:menus_create');
	    Route::any('/{id}/edit', 'MenusController@edit')->middleware('permission:menus_edit');
	    Route::delete('/{id}/delete', 'MenusController@delete')->middleware('permission:menus_delete');
	});

	Route::group(['prefix' => 'permissions'], function () {
	    Route::get('/', 'PermissionsController@index')->middleware('permission:permissions_view');
	    Route::get('/{id}/view', 'PermissionsController@view')->middleware('permission:permissions_view');
	    Route::any('/create', 'PermissionsController@create')->middleware('permission:permissions_create');
	    Route::any('/{id}/edit', 'PermissionsController@edit')->middleware('permission:permissions_edit');
	    Route::delete('/{id}/delete', 'PermissionsController@delete')->middleware('permission:permissions_delete');
	});
	/** Controllers Master **/
		Route::group(['prefix' => 'output'], function () {
		    Route::get('/', 'Master\OutputController@index')->middleware('permission:output_view');
		    Route::get('/{id}/view', 'Master\OutputController@view')->middleware('permission:output_view');
		    Route::any('/create', 'Master\OutputController@create')->middleware('permission:output_create');
		    Route::any('/{id}/edit', 'Master\OutputController@edit')->middleware('permission:output_edit');
		    Route::delete('/{id}/delete', 'Master\OutputController@delete')->middleware('permission:output_delete');
		});

		Route::group(['prefix' => 'suboutput'], function () {
		    Route::get('/', 'Master\SubOutputController@index')->middleware('permission:suboutput_view');
		    Route::get('/{id}/view', 'Master\SubOutputController@view')->middleware('permission:suboutput_view');
		    Route::any('/create', 'Master\SubOutputController@create')->middleware('permission:suboutput_create');
		    Route::any('/{id}/edit', 'Master\SubOutputController@edit')->middleware('permission:suboutput_edit');
		    Route::delete('/{id}/delete', 'Master\SubOutputController@delete')->middleware('permission:suboutput_delete');
		});

		Route::group(['prefix' => 'sasaran'], function () {
		    Route::get('/', 'Master\SasaranController@index')->middleware('permission:sasaran_view');
		    Route::get('/{id}/view', 'Master\SasaranController@view')->middleware('permission:sasaran_view');
		    Route::any('/create', 'Master\SasaranController@create')->middleware('permission:sasaran_create');
		    Route::any('/{id}/edit', 'Master\SasaranController@edit')->middleware('permission:sasaran_edit');
		    Route::delete('/{id}/delete', 'Master\SasaranController@delete')->middleware('permission:sasaran_delete');
		});

		Route::group(['prefix' => 'volume'], function () {
		    Route::get('/', 'Master\VolumeController@index')->middleware('permission:volume_view');
		    Route::get('/{id}/view', 'Master\VolumeController@view')->middleware('permission:volume_view');
		    Route::any('/create', 'Master\VolumeController@create')->middleware('permission:volume_create');
		    Route::any('/{id}/edit', 'Master\VolumeController@edit')->middleware('permission:volume_edit');
		    Route::delete('/{id}/delete', 'Master\VolumeController@delete')->middleware('permission:volume_delete');
		});

		Route::group(['prefix' => 'uraian'], function () {
		    Route::get('/', 'Master\UraianController@index')->middleware('permission:volume_view');
		    Route::get('/{id}/view', 'Master\UraianController@view')->middleware('permission:volume_view');
		    Route::any('/create', 'Master\UraianController@create')->middleware('permission:volume_create');
		    Route::any('/{id}/edit', 'Master\UraianController@edit')->middleware('permission:volume_edit');
		    Route::delete('/{id}/delete', 'Master\UraianController@delete')->middleware('permission:volume_delete');
		});

		Route::group(['prefix' => 'detail'], function () {
		    Route::get('/', 'Master\DetailController@index')->middleware('permission:detail_view');
		    Route::get('/{id}/view', 'Master\DetailController@view')->middleware('permission:detail_view');
		    Route::any('/create', 'Master\DetailController@create')->middleware('permission:detail_create');
		    Route::any('/{id}/edit', 'Master\DetailController@edit')->middleware('permission:detail_edit');
		    Route::delete('/{id}/delete', 'Master\DetailController@delete')->middleware('permission:detail_delete');
		});
	/** End controllers Master **/
	Route::group(['prefix' => 'program'], function () {
	    Route::get('/', 'ProgramController@index')->middleware('permission:program_view');
	    Route::get('/{id}/view', 'ProgramController@view')->middleware('permission:program_view');
	    Route::any('/create', 'ProgramController@create')->middleware('permission:program_create');
	    Route::any('/{id}/edit', 'ProgramController@edit')->middleware('permission:program_edit');
	    Route::delete('/{id}/delete', 'ProgramController@delete')->middleware('permission:program_delete');
	});

	/** Controllers Detail **/
	Route::group(['prefix' => 'details'], function () {


		Route::group(['prefix' => 'asian-games'], function () {
		    Route::get('/{programId}', 'Detail\AsianGamesController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\AsianGamesController@view');
		    Route::any('/{programId}/create', 'Detail\AsianGamesController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\AsianGamesController@edit');
		    Route::delete('/{id}/delete', 'Detail\AsianGamesController@delete');
		});

		Route::group(['prefix' => 'bgh'], function () {
		    Route::get('/{programId}', 'Detail\BghController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\BghController@view');
		    Route::any('/{programId}/create', 'Detail\BghController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\BghController@edit');
		    Route::delete('/{id}/delete', 'Detail\BghController@delete');
		});

		Route::group(['prefix' => 'bg-mitigasi-bencana'], function () {
		    Route::get('/{programId}', 'Detail\BgMitigasiBencanaController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\BgMitigasiBencanaController@view');
		    Route::any('/{programId}/create', 'Detail\BgMitigasiBencanaController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\BgMitigasiBencanaController@edit');
		    Route::delete('/{id}/delete', 'Detail\BgMitigasiBencanaController@delete');
		});

		Route::group(['prefix' => 'bg-negara'], function () {
		    Route::get('/{programId}', 'Detail\BgNegaraController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\BgNegaraController@view');
		    Route::any('/{programId}/create', 'Detail\BgNegaraController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\BgNegaraController@edit');
		    Route::delete('/{id}/delete', 'Detail\BgNegaraController@delete');
		});

		Route::group(['prefix' => 'bg-pusaka-dan-istana'], function () {
		    Route::get('/{programId}', 'Detail\BgPusakaDanIstanaController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\BgPusakaDanIstanaController@view');
		    Route::any('/{programId}/create', 'Detail\BgPusakaDanIstanaController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\BgPusakaDanIstanaController@edit');
		    Route::delete('/{id}/delete', 'Detail\BgPusakaDanIstanaController@delete');
		});

		Route::group(['prefix' => 'bg-umum'], function () {
		    Route::get('/{programId}', 'Detail\BgUmumController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\BgUmumController@view');
		    Route::any('/{programId}/create', 'Detail\BgUmumController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\BgUmumController@edit');
		    Route::delete('/{id}/delete', 'Detail\BgUmumController@delete');
		});

		Route::group(['prefix' => 'hsbgn'], function () {
		    Route::get('/{programId}', 'Detail\HsbgnController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\HsbgnController@view');
		    Route::any('/{programId}/create', 'Detail\HsbgnController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\HsbgnController@edit');
		    Route::delete('/{id}/delete', 'Detail\HsbgnController@delete');
		});

		Route::group(['prefix' => 'kws-cagar-budaya'], function () {
		    Route::get('/{programId}', 'Detail\KwsCagarBudayaController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\KwsCagarBudayaController@view');
		    Route::any('/{programId}/create', 'Detail\KwsCagarBudayaController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\KwsCagarBudayaController@edit');
		    Route::delete('/{id}/delete', 'Detail\KwsCagarBudayaController@delete');
		});

		Route::group(['prefix' => 'kws-perkotaan-strategis'], function () {
		    Route::get('/{programId}', 'Detail\KwsPerkotaanStrategisController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\KwsPerkotaanStrategisController@view');
		    Route::any('/{programId}/create', 'Detail\KwsPerkotaanStrategisController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\KwsPerkotaanStrategisController@edit');
		    Route::delete('/{id}/delete', 'Detail\KwsPerkotaanStrategisController@delete');
		});

		Route::group(['prefix' => 'kws-pusaka-pemukiman-trad'], function () {
		    Route::get('/{programId}', 'Detail\KwsPusakaPemukimanTradController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\KwsPusakaPemukimanTradController@view');
		    Route::any('/{programId}/create', 'Detail\KwsPusakaPemukimanTradController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\KwsPusakaPemukimanTradController@edit');
		    Route::delete('/{id}/delete', 'Detail\KwsPusakaPemukimanTradController@delete');
		});

		Route::group(['prefix' => 'pelepasan-rng-3'], function () {
		    Route::get('/{programId}', 'Detail\PelepasanRng3Controller@index');
		    Route::get('/{programId}/{id}/view', 'Detail\PelepasanRng3Controller@view');
		    Route::any('/{programId}/create', 'Detail\PelepasanRng3Controller@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\PelepasanRng3Controller@edit');
		    Route::delete('/{id}/delete', 'Detail\PelepasanRng3Controller@delete');
		});

	});
	/** End controllers Detail **/
});
