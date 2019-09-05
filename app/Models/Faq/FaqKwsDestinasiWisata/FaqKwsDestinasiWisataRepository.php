<?php
namespace App\Models\Faq\FaqKwsDestinasiWisata;

use DB;
use File;

class FaqKwsDestinasiWisataRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-kws-destinasi-wisata/dokumentasi';

      
    public function __construct(
        FaqKwsDestinasiWisata $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_destinasi_wisata.id',
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqKwsDestinasiWisataTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('dokumentasi')) {
			$image = $request->file('dokumentasi');
			if (File::exists(public_path($model->dokumentasi))) {
				File::delete(public_path($model->dokumentasi));
			}
			$filename = str_slug($request->dokumentasi).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->dokumentasi = $this->basePath1.'/'.$filename;
		}

        $model->kws_destinasi_wisata_id = $request->input('kws_destinasi_wisata_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->lokasi_berada_di_kawasan = $request->input('lokasi_berada_di_kawasan');
		$model->nama_kawasan = $request->input('nama_kawasan');
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
		$model->biaya_pelaksanaan_kontraktor = $request->input('biaya_pelaksanaan_kontraktor');
		$model->manajemen_konstruksi = $request->input('manajemen_konstruksi');
		$model->rencana_keu = $request->input('rencana_keu');
		$model->rencana_fisik = $request->input('rencana_fisik');
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
                        'faq_kws_destinasi_wisata.id',
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqKwsDestinasiWisataTransformer)->transformPaginate($model);
    }
}