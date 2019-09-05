<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public $details = [
		'AsianGames' => 'tbl_detail_asian_games',
		'Bgh' => 'tbl_detail_bgh',
		'BgMitigasiBencana' => 'tbl_detail_bg_mitigasi_bencana',
		'BgNegara' => 'tbl_detail_bg_negara',
		'RehabBgPusakaIstana' => 'tbl_detail_rehab_bg_pusaka_istana',
		'BgUmum' => 'tbl_detail_bg_umum',
		'Hsbgn' => 'tbl_detail_hsbgn',
		'AssetCagarBudaya' => 'tbl_detail_asset_cagar_budaya',
		'KwsPerkotaanStrategis' => 'tbl_detail_kws_perkotaan_strategis',
		'KwsPusakaPemukimanTrad' => 'tbl_detail_kws_pusaka_pemukiman_trad',
		'PelepasanRng3' => 'tbl_detail_pelepasan_rng3',
		'PenataanBgKwsDestinasiWisata' => 'tbl_detail_penataan_bg_kws_destinasi_wisata',
		'PenataanBgKwsPrioritasNasional' => 'tbl_detail_penataan_bg_kws_prioritas_nasional',
		'PenataanBgKwsRawanBencana' => 'tbl_detail_penataan_bg_kws_rawan_bencana',
		'PengelolaTeknisBersertifikasi' => 'tbl_detail_pengelola_teknis_bersertifikasi',
		'PengembanganKotaHijau' => 'tbl_detail_pengembangan_kota_hijau',
		'Plbn' => 'tbl_detail_plbn',
		'RegulasiPerda' => 'tbl_detail_regulasi_perda',
		'RehabBgPusakaIstana' => 'tbl_detail_rehab_bg_pusaka_istana',
		'RevolusiMental' => 'tbl_detail_revolusi_mental',
		'RthRencanaTigapuluhpersen' => 'tbl_detail_rth_rencana_tigapuluhpersen',
		'RthStatusTigapuluhpersen' => 'tbl_detail_rth_status_tigapuluhpersen',
		'Tabg' => 'tbl_detail_tabg',
		'TabgCb' => 'tbl_detail_tabg_cb',
	];

	public $faqs = [
		'FaqAsianGames' => 'faq_asian_games',
		'FaqAssetCagarBudaya' => 'faq_asset_cagar_budaya',
		'FaqBgh' => 'faq_bgh',
		'FaqBgMitigasiBencana' => 'faq_bg_mitigasi_bencana',
		'FaqBgNegara' => 'faq_bg_negara',
		'FaqBgUmum' => 'faq_bg_umum',
		'FaqHsbgn' => 'faq_hsbgn',
		'FaqKwsDestinasiWisata' => 'faq_kws_destinasi_wisata',
		'FaqKwsPerkotaanStrategis' => 'faq_kws_perkotaan_strategis',
		'FaqKwsPrioritasNasional' => 'faq_kws_prioritas_nasional',
		'FaqKwsPusakaPemukimanTrad' => 'faq_kws_pusaka_pemukiman_trad',
		'FaqKwsRawanBencana' => 'faq_kws_rawan_bencana',
		'FaqPengelolaTeknisBersertifikasi' => 'faq_pengelola_teknis_bersertifikasi',
		'FaqPengembanganKotaHijau' => 'faq_pengembangan_kota_hijau',
		'FaqPlbn' => 'faq_plbn',
		'FaqRegulasiPerda' => 'faq_regulasi_perda',
		'FaqRehabBgPusakaIstana' => 'faq_rehab_bg_pusaka_istana',
		'FaqRevolusiMental' => 'faq_revolusi_mental',
		'FaqRthRencanaTigapuluhpersen' => 'faq_rth_rencana_tigapuluhpersen',
		'FaqRthStatusTigapuluhpersen' => 'faq_rth_status_tigapuluhpersen',
		'FaqTabg' => 'faq_tabg',
		'FaqTabgCb' => 'faq_tabg_cb',
		'FaqPelepasanRng3' => 'faq_pelepasan_rng3',
	];

	public function index()
	{
		return view('welcome');
	}

    public function generateFaqs()
    {
    	$message = 'Ok';
    	try {
	    	foreach ($this->faqs as $key => $table) {
	    		\Artisan::call('faqs:generator', ['name' => $key, 'table' => $table]);
	    	}
    	} catch (\Exception $e) {
    		$message = $e->getMessage();
    	}

    	return $message;
    }

    public function generateDetails()
    {
    	$message = 'Ok';
    	try {
	    	foreach ($this->details as $key => $table) {
	    		\Artisan::call('crud:generator', ['name' => $key, 'table' => $table]);
	    	}
    	} catch (\Exception $e) {
    		$message = $e->getMessage();
    	}

    	return $message;
    }

}
