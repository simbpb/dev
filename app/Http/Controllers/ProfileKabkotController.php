<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use JsValidator;
use Validator;
use Illuminate\Http\Request;
use App\Models\User\UserRepository;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\InfoWilayah\InfoWilayah;

class ProfileKabkotController extends Controller {
    
    protected $model;
    protected $lokasi;

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

    public function __construct(
        UserRepository $user,
        LokasiRepository $lokasi
    ) {
        $this->model = $user;
        $this->lokasi = $lokasi;
    }

    public function kabkot(Request $request)
    {
        $user = Auth::user();
        $model = $this->model->find($user->id);
        $provinces = $this->lokasi->getTextProvincesOptions();
        $rows = $this->faqs;

        if ($request->ajax()) {
            $provinceId = $request->get('province');
            $cityId = $request->get('city');
            $lokasiKode = $provinceId.'.'.$cityId.'.00.0000';

            $info = InfoWilayah::where('lokasi_kode',$lokasiKode)->first();

            if ($info) {
                return ['success' => true, 'lokasiKode' => $lokasiKode, 'data' => $info];
            } else {
                return ['success' => false, 'data' => 'Data kosong'];
            }
        }
        
        return view('kabkot.index',compact('provinces','rows'));
    }

}

