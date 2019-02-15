<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'datamart'], function () {
	Route::get('/faq-asian-games', 'Api\FaqAsianGamesController@index');
	Route::get('/faq-asset-cagar-budaya', 'Api\FaqAssetCagarBudayaController@index');
	Route::get('/faq-bgh', 'Api\FaqBghController@index');
	Route::get('/faq-bg-mitigasi-bencana', 'Api\FaqBgMitigasiBencanaController@index');
	Route::get('/faq-bg-negara', 'Api\FaqBgNegaraController@index');
	Route::get('/faq-bg-umum', 'Api\FaqBgUmumController@index');
	Route::get('/faq-hsbgn', 'Api\FaqHsbgnController@index');
	Route::get('/faq-kws-destinasi-wisata', 'Api\FaqKwsDestinasiWisataController@index');
	Route::get('/faq-kws-perkotaan-strategis', 'Api\FaqKwsPerkotaanStrategisController@index');
	Route::get('/faq-kws-prioritas-nasional', 'Api\FaqKwsPrioritasNasionalController@index');
	Route::get('/faq-kws-pusaka-pemukiman-trad', 'Api\FaqKwsPusakaPemukimanTradController@index');
	Route::get('/faq-kws-rawan-bencana', 'Api\FaqKwsRawanBencanaController@index');
	Route::get('/faq-pengelola-teknis-bersertifikasi', 'Api\FaqPengelolaTeknisBersertifikasiController@index');
	Route::get('/faq-pengembangan-kota-hijau', 'Api\FaqPengembanganKotaHijauController@index');
	Route::get('/faq-plbn', 'Api\FaqPlbnController@index');
	Route::get('/faq-regulasi-perda', 'Api\FaqRegulasiPerdaController@index');
	Route::get('/faq-rehab-bg-pusaka-istana', 'Api\FaqRehabBgPusakaIstanaController@index');
	Route::get('/faq-revolusi-mental', 'Api\FaqRevolusiMentalController@index');
	Route::get('/faq-rth-rencana-tigapuluhpersen', 'Api\FaqRthRencanaTigapuluhpersenController@index');
	Route::get('/faq-rth-status-tigapuluhpersen', 'Api\FaqRthStatusTigapuluhpersenController@index');
	Route::get('/faq-tabg', 'Api\FaqTabgController@index');
	Route::get('/faq-tabg-cb', 'Api\FaqTabgCbController@index');
	Route::get('/faq-pelepasan-rng-3', 'Api\FaqPelepasanRng3Controller@index');
});