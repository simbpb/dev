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
// Route::get('/generate-details', 'HomeController@generateDetails');
// Route::get('/generate-faqs', 'HomeController@generateFaqs');
Route::group(['prefix' => config('app.auth_page')], function () {
	Auth::routes();
});

Route::group(['prefix' => config('app.auth_page'), 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/profile', 'Auth\ProfileController@index');
    Route::get('/profile/kabkot', 'Auth\ProfileController@kabkot')->middleware('permission:profilekabkot_view');
    Route::any('/change-password', 'Auth\ProfileController@changePassword');
    Route::get('/data-mart', 'DataMartController@index');
    
    Route::group(['prefix' => 'ajax'], function () {
    	Route::get('/cities/{provinceId}', 'Ajax\LocationsController@cities');
    	Route::get('/districts/{provinceId}/{cityId}', 'Ajax\LocationsController@districts');
    	Route::get('/suboutput/{outputId}', 'Ajax\MasterController@suboutput');
    	Route::get('/sasaran/{suboutputId}', 'Ajax\MasterController@sasaran');
    	Route::get('/volume/{outputId}', 'Ajax\MasterController@volume');
    	Route::get('/tupoksi/{subditId}', 'Ajax\MasterController@tupoksi');

    	Route::get('/aktivitas1/{komponenId}', 'Ajax\MasterController@aktivitas1');
    	Route::get('/aktivitas2/{komponenId}', 'Ajax\MasterController@aktivitas2');
    	Route::get('/aktivitas3/{komponenId}', 'Ajax\MasterController@aktivitas3');
    	Route::get('/aktivitas4/{komponenId}', 'Ajax\MasterController@aktivitas4');

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
		    Route::get('/', 'Master\UraianController@index')->middleware('permission:uraian_view');
		    Route::get('/{id}/view', 'Master\UraianController@view')->middleware('permission:uraian_view');
		    Route::any('/create', 'Master\UraianController@create')->middleware('permission:uraian_create');
		    Route::any('/{id}/edit', 'Master\UraianController@edit')->middleware('permission:uraian_edit');
		    Route::delete('/{id}/delete', 'Master\UraianController@delete')->middleware('permission:uraian_delete');
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

	/** Controller integration **/
	Route::group(['prefix' => 'integrasi-fact-hsbgn'], function () {
	    Route::get('/', 'IntegrasiFactHsbgnController@index')->middleware('permission:integrasi-fact-hsbgn_view');
	    Route::get('/{id}/view', 'IntegrasiFactHsbgnController@view')->middleware('permission:integrasi-fact-hsbgn_view');
	    Route::any('/create', 'IntegrasiFactHsbgnController@create')->middleware('permission:integrasi-fact-hsbgn_create');
	    Route::any('/{id}/edit', 'IntegrasiFactHsbgnController@edit')->middleware('permission:integrasi-fact-hsbgn_edit');
	    Route::delete('/{id}/delete', 'IntegrasiFactHsbgnController@delete')->middleware('permission:integrasi-fact-hsbgn_delete');
	});

	Route::group(['prefix' => 'integrasi-fact-perdabg'], function () {
	    Route::get('/', 'IntegrasiFactPerdabgController@index')->middleware('permission:integrasi-fact-perdabg_view');
	    Route::get('/{id}/view', 'IntegrasiFactPerdabgController@view')->middleware('permission:integrasi-fact-perdabg_view');
	    Route::any('/create', 'IntegrasiFactPerdabgController@create')->middleware('permission:integrasi-fact-perdabg_create');
	    Route::any('/{id}/edit', 'IntegrasiFactPerdabgController@edit')->middleware('permission:integrasi-fact-perdabg_edit');
	    Route::delete('/{id}/delete', 'IntegrasiFactPerdabgController@delete')->middleware('permission:integrasi-fact-perdabg_delete');
	});

	Route::group(['prefix' => 'integrasi-rn'], function () {
	    Route::get('/', 'IntegrasiRnController@index')->middleware('permission:integrasi-rn_view');
	    Route::get('/{id}/view', 'IntegrasiRnController@view')->middleware('permission:integrasi-rn_view');
	    Route::any('/create', 'IntegrasiRnController@create')->middleware('permission:integrasi-rn_create');
	    Route::any('/{id}/edit', 'IntegrasiRnController@edit')->middleware('permission:integrasi-rn_edit');
	    Route::delete('/{id}/delete', 'IntegrasiRnController@delete')->middleware('permission:integrasi-rn_delete');
	});

	Route::group(['prefix' => 'integrasi-rn-rekap-kemen'], function () {
	    Route::get('/', 'IntegrasiRnRekapKemenController@index')->middleware('permission:integrasi-rn-rekap-kemen_view');
	    Route::get('/{id}/view', 'IntegrasiRnRekapKemenController@view')->middleware('permission:integrasi-rn-rekap-kemen_view');
	    Route::any('/create', 'IntegrasiRnRekapKemenController@create')->middleware('permission:integrasi-rn-rekap-kemen_create');
	    Route::any('/{id}/edit', 'IntegrasiRnRekapKemenController@edit')->middleware('permission:integrasi-rn-rekap-kemen_edit');
	    Route::delete('/{id}/delete', 'IntegrasiRnRekapKemenController@delete')->middleware('permission:integrasi-rn-rekap-kemen_delete');
	});

	Route::group(['prefix' => 'integrasi-rn-rekap-prop'], function () {
	    Route::get('/', 'IntegrasiRnRekapPropController@index')->middleware('permission:integrasi-rn-rekap-prop_view');
	    Route::get('/{id}/view', 'IntegrasiRnRekapPropController@view')->middleware('permission:integrasi-rn-rekap-prop_view');
	    Route::any('/create', 'IntegrasiRnRekapPropController@create')->middleware('permission:integrasi-rn-rekap-prop_create');
	    Route::any('/{id}/edit', 'IntegrasiRnRekapPropController@edit')->middleware('permission:integrasi-rn-rekap-prop_edit');
	    Route::delete('/{id}/delete', 'IntegrasiRnRekapPropController@delete')->middleware('permission:integrasi-rn-rekap-prop_delete');
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

		Route::group(['prefix' => 'info-kewilayahan'], function () {
		    Route::get('/{programId}', 'Detail\InfoKewilayahanController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\InfoKewilayahanController@view');
		    Route::any('/{programId}/create', 'Detail\InfoKewilayahanController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\InfoKewilayahanController@edit');
		    Route::delete('/{id}/delete', 'Detail\InfoKewilayahanController@delete');
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

		Route::group(['prefix' => 'penataan-bg-kws-destinasi-wisata'], function () {
		    Route::get('/{programId}', 'Detail\PenataanBgKwsDestinasiWisataController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\PenataanBgKwsDestinasiWisataController@view');
		    Route::any('/{programId}/create', 'Detail\PenataanBgKwsDestinasiWisataController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\PenataanBgKwsDestinasiWisataController@edit');
		    Route::delete('/{id}/delete', 'Detail\PenataanBgKwsDestinasiWisataController@delete');
		});

		Route::group(['prefix' => 'penataan-bg-kws-prioritas-nasional'], function () {
		    Route::get('/{programId}', 'Detail\PenataanBgKwsPrioritasNasionalController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\PenataanBgKwsPrioritasNasionalController@view');
		    Route::any('/{programId}/create', 'Detail\PenataanBgKwsPrioritasNasionalController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\PenataanBgKwsPrioritasNasionalController@edit');
		    Route::delete('/{id}/delete', 'Detail\PenataanBgKwsPrioritasNasionalController@delete');
		});

		Route::group(['prefix' => 'penataan-bg-kws-rawan-bencana'], function () {
		    Route::get('/{programId}', 'Detail\PenataanBgKwsRawanBencanaController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\PenataanBgKwsRawanBencanaController@view');
		    Route::any('/{programId}/create', 'Detail\PenataanBgKwsRawanBencanaController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\PenataanBgKwsRawanBencanaController@edit');
		    Route::delete('/{id}/delete', 'Detail\PenataanBgKwsRawanBencanaController@delete');
		});

		Route::group(['prefix' => 'pengelola-teknis-bersertifikasi'], function () {
		    Route::get('/{programId}', 'Detail\PengelolaTeknisBersertifikasiController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\PengelolaTeknisBersertifikasiController@view');
		    Route::any('/{programId}/create', 'Detail\PengelolaTeknisBersertifikasiController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\PengelolaTeknisBersertifikasiController@edit');
		    Route::delete('/{id}/delete', 'Detail\PengelolaTeknisBersertifikasiController@delete');
		});

		Route::group(['prefix' => 'pengembangan-kota-hijau'], function () {
		    Route::get('/{programId}', 'Detail\PengembanganKotaHijauController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\PengembanganKotaHijauController@view');
		    Route::any('/{programId}/create', 'Detail\PengembanganKotaHijauController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\PengembanganKotaHijauController@edit');
		    Route::delete('/{id}/delete', 'Detail\PengembanganKotaHijauController@delete');
		});

		Route::group(['prefix' => 'plbn'], function () {
		    Route::get('/{programId}', 'Detail\PlbnController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\PlbnController@view');
		    Route::any('/{programId}/create', 'Detail\PlbnController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\PlbnController@edit');
		    Route::delete('/{id}/delete', 'Detail\PlbnController@delete');
		});

		Route::group(['prefix' => 'regulasi-perda'], function () {
		    Route::get('/{programId}', 'Detail\RegulasiPerdaController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\RegulasiPerdaController@view');
		    Route::any('/{programId}/create', 'Detail\RegulasiPerdaController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\RegulasiPerdaController@edit');
		    Route::delete('/{id}/delete', 'Detail\RegulasiPerdaController@delete');
		});

		Route::group(['prefix' => 'rehab-bg-pusaka-istana'], function () {
		    Route::get('/{programId}', 'Detail\RehabBgPusakaIstanaController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\RehabBgPusakaIstanaController@view');
		    Route::any('/{programId}/create', 'Detail\RehabBgPusakaIstanaController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\RehabBgPusakaIstanaController@edit');
		    Route::delete('/{id}/delete', 'Detail\RehabBgPusakaIstanaController@delete');
		});

		Route::group(['prefix' => 'revolusi-mental'], function () {
		    Route::get('/{programId}', 'Detail\RevolusiMentalController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\RevolusiMentalController@view');
		    Route::any('/{programId}/create', 'Detail\RevolusiMentalController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\RevolusiMentalController@edit');
		    Route::delete('/{id}/delete', 'Detail\RevolusiMentalController@delete');
		});

		Route::group(['prefix' => 'rth-rencana-tigapuluhpersen'], function () {
		    Route::get('/{programId}', 'Detail\RthRencanaTigapuluhpersenController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\RthRencanaTigapuluhpersenController@view');
		    Route::any('/{programId}/create', 'Detail\RthRencanaTigapuluhpersenController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\RthRencanaTigapuluhpersenController@edit');
		    Route::delete('/{id}/delete', 'Detail\RthRencanaTigapuluhpersenController@delete');
		});

		Route::group(['prefix' => 'rth-status-tigapuluhpersen'], function () {
		    Route::get('/{programId}', 'Detail\RthStatusTigapuluhpersenController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\RthStatusTigapuluhpersenController@view');
		    Route::any('/{programId}/create', 'Detail\RthStatusTigapuluhpersenController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\RthStatusTigapuluhpersenController@edit');
		    Route::delete('/{id}/delete', 'Detail\RthStatusTigapuluhpersenController@delete');
		});

		Route::group(['prefix' => 'tabg'], function () {
		    Route::get('/{programId}', 'Detail\TabgController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\TabgController@view');
		    Route::any('/{programId}/create', 'Detail\TabgController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\TabgController@edit');
		    Route::delete('/{id}/delete', 'Detail\TabgController@delete');
		});

		Route::group(['prefix' => 'tabg-cb'], function () {
		    Route::get('/{programId}', 'Detail\TabgCbController@index');
		    Route::get('/{programId}/{id}/view', 'Detail\TabgCbController@view');
		    Route::any('/{programId}/create', 'Detail\TabgCbController@create');
		    Route::any('/{programId}/{id}/edit', 'Detail\TabgCbController@edit');
		    Route::delete('/{id}/delete', 'Detail\TabgCbController@delete');
		});

	});
	/** End controllers Detail **/


	Route::group(['prefix' => 'faqs', 'middleware' => 'permission:datamart_view'], function () {
		Route::get('/faq-asian-games', 'Faq\FaqAsianGamesController@index');
		Route::get('/faq-asset-cagar-budaya', 'Faq\FaqAssetCagarBudayaController@index');
		Route::get('/faq-bgh', 'Faq\FaqBghController@index');
		Route::get('/faq-bg-mitigasi-bencana', 'Faq\FaqBgMitigasiBencanaController@index');
		Route::get('/faq-bg-negara', 'Faq\FaqBgNegaraController@index');
		Route::get('/faq-bg-umum', 'Faq\FaqBgUmumController@index');
		Route::get('/faq-hsbgn', 'Faq\FaqHsbgnController@index');
		Route::get('/faq-kws-destinasi-wisata', 'Faq\FaqKwsDestinasiWisataController@index');
		Route::get('/faq-kws-perkotaan-strategis', 'Faq\FaqKwsPerkotaanStrategisController@index');
		Route::get('/faq-kws-prioritas-nasional', 'Faq\FaqKwsPrioritasNasionalController@index');
		Route::get('/faq-kws-pusaka-pemukiman-trad', 'Faq\FaqKwsPusakaPemukimanTradController@index');
		Route::get('/faq-kws-rawan-bencana', 'Faq\FaqKwsRawanBencanaController@index');
		Route::get('/faq-pengelola-teknis-bersertifikasi', 'Faq\FaqPengelolaTeknisBersertifikasiController@index');
		Route::get('/faq-pengembangan-kota-hijau', 'Faq\FaqPengembanganKotaHijauController@index');
		Route::get('/faq-plbn', 'Faq\FaqPlbnController@index');
		Route::get('/faq-regulasi-perda', 'Faq\FaqRegulasiPerdaController@index');
		Route::get('/faq-rehab-bg-pusaka-istana', 'Faq\FaqRehabBgPusakaIstanaController@index');
		Route::get('/faq-revolusi-mental', 'Faq\FaqRevolusiMentalController@index');
		Route::get('/faq-rth-rencana-tigapuluhpersen', 'Faq\FaqRthRencanaTigapuluhpersenController@index');
		Route::get('/faq-rth-status-tigapuluhpersen', 'Faq\FaqRthStatusTigapuluhpersenController@index');
		Route::get('/faq-tabg', 'Faq\FaqTabgController@index');
		Route::get('/faq-tabg-cb', 'Faq\FaqTabgCbController@index');
	});
});
