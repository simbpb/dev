<?php
namespace App\Models\Faq\FaqKwsRawanBencana;

use DB;
use File;

class FaqKwsRawanBencanaRepository
{

    protected $model;
    
      
    public function __construct(
        FaqKwsRawanBencana $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_rawan_bencana.id',
                        'faq_kws_rawan_bencana.kws_rawan_bencana_id',
						'faq_kws_rawan_bencana.info_wilayah_id',
						'faq_kws_rawan_bencana.detail_kdprog_id',
						'faq_kws_rawan_bencana.thn_periode_keg',
						'faq_kws_rawan_bencana.lokasi_kode',
						'faq_kws_rawan_bencana.nama_propinsi',
						'faq_kws_rawan_bencana.nama_kabupatenkota',
						'faq_kws_rawan_bencana.kd_struktur',
						'faq_kws_rawan_bencana.indeks_risiko_bencana',
						'faq_kws_rawan_bencana.tingkat_risiko_bencana',
						'faq_kws_rawan_bencana.risiko_bencana_dominan',
						'faq_kws_rawan_bencana.struktur_ruang',
						'faq_kws_rawan_bencana.nama_kegiatan',
						'faq_kws_rawan_bencana.thn_anggaran',
						'faq_kws_rawan_bencana.sumber_anggaran',
						'faq_kws_rawan_bencana.alokasi_anggaran',
						'faq_kws_rawan_bencana.volume_pekerjaan',
						'faq_kws_rawan_bencana.instansi_unit_organisasi_pelaksana',
						'faq_kws_rawan_bencana.lokasi_kegiatan_proyek',
						'faq_kws_rawan_bencana.titik_koordinat_lat',
						'faq_kws_rawan_bencana.titik_koordinat_long',
						'faq_kws_rawan_bencana.status_aset',
						'faq_kws_rawan_bencana.tgl_input_wilayah',
						'faq_kws_rawan_bencana.info_wilayah_sk',
						'faq_kws_rawan_bencana.last_update',
                        'faq_kws_rawan_bencana.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_rawan_bencana.kws_rawan_bencana_id',
						'faq_kws_rawan_bencana.info_wilayah_id',
						'faq_kws_rawan_bencana.detail_kdprog_id',
						'faq_kws_rawan_bencana.thn_periode_keg',
						'faq_kws_rawan_bencana.lokasi_kode',
						'faq_kws_rawan_bencana.nama_propinsi',
						'faq_kws_rawan_bencana.nama_kabupatenkota',
						'faq_kws_rawan_bencana.kd_struktur',
						'faq_kws_rawan_bencana.indeks_risiko_bencana',
						'faq_kws_rawan_bencana.tingkat_risiko_bencana',
						'faq_kws_rawan_bencana.risiko_bencana_dominan',
						'faq_kws_rawan_bencana.struktur_ruang',
						'faq_kws_rawan_bencana.nama_kegiatan',
						'faq_kws_rawan_bencana.thn_anggaran',
						'faq_kws_rawan_bencana.sumber_anggaran',
						'faq_kws_rawan_bencana.alokasi_anggaran',
						'faq_kws_rawan_bencana.volume_pekerjaan',
						'faq_kws_rawan_bencana.instansi_unit_organisasi_pelaksana',
						'faq_kws_rawan_bencana.lokasi_kegiatan_proyek',
						'faq_kws_rawan_bencana.titik_koordinat_lat',
						'faq_kws_rawan_bencana.titik_koordinat_long',
						'faq_kws_rawan_bencana.status_aset',
						'faq_kws_rawan_bencana.tgl_input_wilayah',
						'faq_kws_rawan_bencana.info_wilayah_sk',
						'faq_kws_rawan_bencana.last_update',
                        'faq_kws_rawan_bencana.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqKwsRawanBencanaTransformer)->transformPaginate($model);
    }
}