<?php
namespace App\Models\Faq\FaqPengembanganKotaHijau;

use DB;
use File;

class FaqPengembanganKotaHijauRepository
{

    protected $model;
    
      
    public function __construct(
        FaqPengembanganKotaHijau $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pengembangan_kota_hijau.id',
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    )->searchOrder($request, [
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqPengembanganKotaHijauTransformer)->transformPaginate($model);
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
        
        
        $model->pengembangan_kota_hijau_id = $request->input('pengembangan_kota_hijau_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->thn_anggaran = $request->input('thn_anggaran');
		$model->nama_kegiatan = $request->input('nama_kegiatan');
		$model->attribute_kota_hijau = $request->input('attribute_kota_hijau');
		$model->thn_penetapan = $request->input('thn_penetapan');
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
                        'faq_pengembangan_kota_hijau.id',
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    )->searchOrder($request, [
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqPengembanganKotaHijauTransformer)->transformPaginate($model);
    }
}