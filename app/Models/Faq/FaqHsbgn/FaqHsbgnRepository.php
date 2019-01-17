<?php
namespace App\Models\Faq\FaqHsbgn;

use DB;
use File;

class FaqHsbgnRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-hsbgn/file-sk-penetapan-hsbgn';

      
    public function __construct(
        FaqHsbgn $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_hsbgn.id',
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    )->searchOrder($request, [
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqHsbgnTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_hsbgn.id',
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    )->searchOrder($request, [
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqHsbgnTransformer)->transformPaginate($model);
    }
}