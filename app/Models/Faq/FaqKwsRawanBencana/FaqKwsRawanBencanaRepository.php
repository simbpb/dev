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

    public function find($id)
    {
        $model = $this->model->find($id);
        return $model;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        
        
        $model->kws_rawan_bencana_id = $request->input('kws_rawan_bencana_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->indeks_risiko_bencana = $request->input('indeks_risiko_bencana');
		$model->tingkat_risiko_bencana = $request->input('tingkat_risiko_bencana');
		$model->risiko_bencana_dominan = $request->input('risiko_bencana_dominan');
		$model->struktur_ruang = $request->input('struktur_ruang');
		$model->nama_kegiatan = $request->input('nama_kegiatan');
		$model->thn_anggaran = $request->input('thn_anggaran');
		$model->sumber_anggaran = $request->input('sumber_anggaran');
		$model->alokasi_anggaran = $request->input('alokasi_anggaran');
		$model->volume_pekerjaan = $request->input('volume_pekerjaan');
		$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
		$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
		$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
		$model->titik_koordinat_long = $request->input('titik_koordinat_long');
		$model->status_aset = $request->input('status_aset');
		$model->tgl_input_wilayah = $request->input('tgl_input_wilayah');
		$model->info_wilayah_sk = $request->input('info_wilayah_sk');
		$model->last_update = $request->input('last_update');
        
        $model->save();
        
        DB::commit();
        return true;
    }

    public function listByLokasi($lokasiKode, $request)
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
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqKwsRawanBencanaTransformer)->transformPaginate($model);
    }
}