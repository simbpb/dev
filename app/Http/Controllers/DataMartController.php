<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DataMartController extends Controller
{
	public $faqs = [
		'faq-asian-games' => 'Asian Games',
		'faq-asset-cagar-budaya' => 'Asset Cagar Budaya',
		'faq-bgh' => 'BGH',
		'faq-bg-mitigasi-bencana' => 'BG Mitigasi Bencana',
		'faq-bg-negara' => 'BG Negara',
		'faq-bg-umum' => 'BG Umum',
		'faq-hsbgn' => 'HSBGN',
		'faq-kws-destinasi-wisata' => 'Kawasan Destinasi Wisata',
		'faq-kws-perkotaan-strategis' => 'Kawasan Perkotaan Strategis',
		'faq-kws-prioritas-nasional' => 'Kawasan Prioritas Nasional',
		'faq-kws-pusaka-pemukiman-trad' => 'Kawasan Pusaka Pemukiman Tradisional',
		'faq-kws-rawan-bencana' => 'Kawasan Rawan Bencana',
		'faq-pengelola-teknis-bersertifikasi' => 'Pengelola Teknis Bersertifikasi',
		'faq-pengembangan-kota-hijau' => 'Pengembangan Kota Hijau',
		'faq-plbn' => 'PLBN',
		'faq-regulasi-perda' => 'Regulasi Perda',
		'faq-rehab-bg-pusaka-istana' => 'Rehab BG Pusaka Istana',
		'faq-revolusi-mental' => 'Revolusi Mental',
		'faq-rth-rencana-tigapuluhpersen' => 'RTH Rencana Tiga puluh persen',
		'faq-rth-status-tigapuluhpersen' => 'RTH Status Tiga puluh persen',
		'faq-tabg' => 'TABG',
		'faq-tabg-cb' => 'TABG BC',
	];

	public function index()
	{
		$rows = $this->faqs;
		return view('datamart', compact('rows'));
	}

}
