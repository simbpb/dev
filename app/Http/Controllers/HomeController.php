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
		'BgPusakaDanIstana' => 'tbl_detail_bg_pusaka_dan_istana',
		'BgUmum' => 'tbl_detail_bg_umum',
		'Hsbgn' => 'tbl_detail_hsbgn',
		'InfoKewilayahan' => 'tbl_detail_info_kewilayahan',
		'KwsCagarBudaya' => 'tbl_detail_kws_cagar_budaya',
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

    public function index()
    {
        return view('welcome');
    }

    public function generateAll()
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
