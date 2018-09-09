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

		Route::group(['prefix' => 'eco-district'], function () {
		    Route::get('/', 'Detail\EcoDistrictController@index');
		    Route::get('/{id}/view', 'Detail\EcoDistrictController@view');
		    Route::any('/create', 'Detail\EcoDistrictController@create');
		    Route::any('/{id}/edit', 'Detail\EcoDistrictController@edit');
		    Route::delete('/{id}/delete', 'Detail\EcoDistrictController@delete');
		});

		Route::group(['prefix' => 'kebun-raya'], function () {
		    Route::get('/', 'Detail\KebunRayaController@index');
		    Route::get('/{id}/view', 'Detail\KebunRayaController@view');
		    Route::any('/create', 'Detail\KebunRayaController@create');
		    Route::any('/{id}/edit', 'Detail\KebunRayaController@edit');
		    Route::delete('/{id}/delete', 'Detail\KebunRayaController@delete');
		});

		Route::group(['prefix' => 'kspn'], function () {
		    Route::get('/', 'Detail\KspnController@index');
		    Route::get('/{id}/view', 'Detail\KspnController@view');
		    Route::any('/create', 'Detail\KspnController@create');
		    Route::any('/{id}/edit', 'Detail\KspnController@edit');
		    Route::delete('/{id}/delete', 'Detail\KspnController@delete');
		});

		Route::group(['prefix' => 'kws-rawan-bencana'], function () {
		    Route::get('/', 'Detail\KwsRawanBencanaController@index');
		    Route::get('/{id}/view', 'Detail\KwsRawanBencanaController@view');
		    Route::any('/create', 'Detail\KwsRawanBencanaController@create');
		    Route::any('/{id}/edit', 'Detail\KwsRawanBencanaController@edit');
		    Route::delete('/{id}/delete', 'Detail\KwsRawanBencanaController@delete');
		});

		Route::group(['prefix' => 'nspk-perdabg'], function () {
		    Route::get('/', 'Detail\NspkPerdabgController@index');
		    Route::get('/{id}/view', 'Detail\NspkPerdabgController@view');
		    Route::any('/create', 'Detail\NspkPerdabgController@create');
		    Route::any('/{id}/edit', 'Detail\NspkPerdabgController@edit');
		    Route::delete('/{id}/delete', 'Detail\NspkPerdabgController@delete');
		});

		Route::group(['prefix' => 'p2kh'], function () {
		    Route::get('/', 'Detail\P2khController@index');
		    Route::get('/{id}/view', 'Detail\P2khController@view');
		    Route::any('/create', 'Detail\P2khController@create');
		    Route::any('/{id}/edit', 'Detail\P2khController@edit');
		    Route::delete('/{id}/delete', 'Detail\P2khController@delete');
		});

		Route::group(['prefix' => 'p3kp'], function () {
		    Route::get('/', 'Detail\P3kpController@index');
		    Route::get('/{id}/view', 'Detail\P3kpController@view');
		    Route::any('/create', 'Detail\P3kpController@create');
		    Route::any('/{id}/edit', 'Detail\P3kpController@edit');
		    Route::delete('/{id}/delete', 'Detail\P3kpController@delete');
		});

		Route::group(['prefix' => 'pelepasan-rng3'], function () {
		    Route::get('/', 'Detail\PelepasanRng3Controller@index');
		    Route::get('/{id}/view', 'Detail\PelepasanRng3Controller@view');
		    Route::any('/create', 'Detail\PelepasanRng3Controller@create');
		    Route::any('/{id}/edit', 'Detail\PelepasanRng3Controller@edit');
		    Route::delete('/{id}/delete', 'Detail\PelepasanRng3Controller@delete');
		});

		Route::group(['prefix' => 'rtbl'], function () {
		    Route::get('/', 'Detail\RtblController@index');
		    Route::get('/{id}/view', 'Detail\RtblController@view');
		    Route::any('/create', 'Detail\RtblController@create');
		    Route::any('/{id}/edit', 'Detail\RtblController@edit');
		    Route::delete('/{id}/delete', 'Detail\RtblController@delete');
		});

		Route::group(['prefix' => 'sub-wps'], function () {
		    Route::get('/', 'Detail\SubWpsController@index');
		    Route::get('/{id}/view', 'Detail\SubWpsController@view');
		    Route::any('/create', 'Detail\SubWpsController@create');
		    Route::any('/{id}/edit', 'Detail\SubWpsController@edit');
		    Route::delete('/{id}/delete', 'Detail\SubWpsController@delete');
		});

		Route::group(['prefix' => 'asian-games'], function () {
		    Route::get('/', 'Detail\AsianGamesController@index');
		    Route::get('/{id}/view', 'Detail\AsianGamesController@view');
		    Route::any('/create', 'Detail\AsianGamesController@create');
		    Route::any('/{id}/edit', 'Detail\AsianGamesController@edit');
		    Route::delete('/{id}/delete', 'Detail\AsianGamesController@delete');
		});

		Route::group(['prefix' => 'bantek'], function () {
		    Route::get('/', 'Detail\BantekController@index');
		    Route::get('/{id}/view', 'Detail\BantekController@view');
		    Route::any('/create', 'Detail\BantekController@create');
		    Route::any('/{id}/edit', 'Detail\BantekController@edit');
		    Route::delete('/{id}/delete', 'Detail\BantekController@delete');
		});

		Route::group(['prefix' => 'bgh'], function () {
		    Route::get('/', 'Detail\BghController@index');
		    Route::get('/{id}/view', 'Detail\BghController@view');
		    Route::any('/create', 'Detail\BghController@create');
		    Route::any('/{id}/edit', 'Detail\BghController@edit');
		    Route::delete('/{id}/delete', 'Detail\BghController@delete');
		});
		
		Route::group(['prefix' => 'bg-imb'], function () {
		    Route::get('/', 'Detail\BgImbController@index');
		    Route::get('/{id}/view', 'Detail\BgImbController@view');
		    Route::any('/create', 'Detail\BgImbController@create');
		    Route::any('/{id}/edit', 'Detail\BgImbController@edit');
		    Route::delete('/{id}/delete', 'Detail\BgImbController@delete');
		});

		Route::group(['prefix' => 'bg-slfke-1'], function () {
		    Route::get('/', 'Detail\BgSlfke1Controller@index');
		    Route::get('/{id}/view', 'Detail\BgSlfke1Controller@view');
		    Route::any('/create', 'Detail\BgSlfke1Controller@create');
		    Route::any('/{id}/edit', 'Detail\BgSlfke1Controller@edit');
		    Route::delete('/{id}/delete', 'Detail\BgSlfke1Controller@delete');
		});

		Route::group(['prefix' => 'kota-cerdas'], function () {
		    Route::get('/', 'Detail\KotaCerdasController@index');
		    Route::get('/{id}/view', 'Detail\KotaCerdasController@view');
		    Route::any('/create', 'Detail\KotaCerdasController@create');
		    Route::any('/{id}/edit', 'Detail\KotaCerdasController@edit');
		    Route::delete('/{id}/delete', 'Detail\KotaCerdasController@delete');
		});

		Route::group(['prefix' => 'kws-dpn'], function () {
		    Route::get('/', 'Detail\KwsDpnController@index');
		    Route::get('/{id}/view', 'Detail\KwsDpnController@view');
		    Route::any('/create', 'Detail\KwsDpnController@create');
		    Route::any('/{id}/edit', 'Detail\KwsDpnController@edit');
		    Route::delete('/{id}/delete', 'Detail\KwsDpnController@delete');
		});

		Route::group(['prefix' => 'kws-lingkstrategis'], function () {
		    Route::get('/', 'Detail\KwsLingkstrategisController@index');
		    Route::get('/{id}/view', 'Detail\KwsLingkstrategisController@view');
		    Route::any('/create', 'Detail\KwsLingkstrategisController@create');
		    Route::any('/{id}/edit', 'Detail\KwsLingkstrategisController@edit');
		    Route::delete('/{id}/delete', 'Detail\KwsLingkstrategisController@delete');
		});

		Route::group(['prefix' => 'plbn'], function () {
		    Route::get('/', 'Detail\PlbnController@index');
		    Route::get('/{id}/view', 'Detail\PlbnController@view');
		    Route::any('/create', 'Detail\PlbnController@create');
		    Route::any('/{id}/edit', 'Detail\PlbnController@edit');
		    Route::delete('/{id}/delete', 'Detail\PlbnController@delete');
		});

		Route::group(['prefix' => 'rg-terbukapublik'], function () {
		    Route::get('/', 'Detail\RgTerbukapublikController@index');
		    Route::get('/{id}/view', 'Detail\RgTerbukapublikController@view');
		    Route::any('/create', 'Detail\RgTerbukapublikController@create');
		    Route::any('/{id}/edit', 'Detail\RgTerbukapublikController@edit');
		    Route::delete('/{id}/delete', 'Detail\RgTerbukapublikController@delete');
		});

		Route::group(['prefix' => 'rth'], function () {
		    Route::get('/', 'Detail\RthController@index');
		    Route::get('/{id}/view', 'Detail\RthController@view');
		    Route::any('/create', 'Detail\RthController@create');
		    Route::any('/{id}/edit', 'Detail\RthController@edit');
		    Route::delete('/{id}/delete', 'Detail\RthController@delete');
		});

		Route::group(['prefix' => 'tabg'], function () {
		    Route::get('/', 'Detail\TabgController@index');
		    Route::get('/{id}/view', 'Detail\TabgController@view');
		    Route::any('/create', 'Detail\TabgController@create');
		    Route::any('/{id}/edit', 'Detail\TabgController@edit');
		    Route::delete('/{id}/delete', 'Detail\TabgController@delete');
		});

		Route::group(['prefix' => 'hsbgn'], function () {
		    Route::get('/', 'Detail\HsbgnController@index');
		    Route::get('/{id}/view', 'Detail\HsbgnController@view');
		    Route::any('/create', 'Detail\HsbgnController@create');
		    Route::any('/{id}/edit', 'Detail\HsbgnController@edit');
		    Route::delete('/{id}/delete', 'Detail\HsbgnController@delete');
		});

		Route::group(['prefix' => 'peraturan-nasional'], function () {
		    Route::get('/', 'Detail\PeraturanNasionalController@index');
		    Route::get('/{id}/view', 'Detail\PeraturanNasionalController@view');
		    Route::any('/create', 'Detail\PeraturanNasionalController@create');
		    Route::any('/{id}/edit', 'Detail\PeraturanNasionalController@edit');
		    Route::delete('/{id}/delete', 'Detail\PeraturanNasionalController@delete');
		});

		Route::group(['prefix' => 'wps'], function () {
		    Route::get('/', 'Detail\WpsController@index');
		    Route::get('/{id}/view', 'Detail\WpsController@view');
		    Route::any('/create', 'Detail\WpsController@create');
		    Route::any('/{id}/edit', 'Detail\WpsController@edit');
		    Route::delete('/{id}/delete', 'Detail\WpsController@delete');
		});

	});
	/** End controllers Detail **/
});
