<?php
namespace App\Models\Faq\FaqKwsPusakaPemukimanTrad;

use DB;
use File;

class FaqKwsPusakaPemukimanTradRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-kws-pusaka-pemukiman-trad/dokumentasi';

      
    public function __construct(
        FaqKwsPusakaPemukimanTrad $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_pusaka_pemukiman_trad.id',
                        'faq_kws_pusaka_pemukiman_trad.kws_pusaka_trad_id',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_id',
						'faq_kws_pusaka_pemukiman_trad.detail_kdprog_id',
						'faq_kws_pusaka_pemukiman_trad.thn_periode_keg',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kode',
						'faq_kws_pusaka_pemukiman_trad.nama_propinsi',
						'faq_kws_pusaka_pemukiman_trad.nama_kabupatenkota',
						'faq_kws_pusaka_pemukiman_trad.kd_struktur',
						'faq_kws_pusaka_pemukiman_trad.nama_kawasan',
						'faq_kws_pusaka_pemukiman_trad.jenis_kawasan',
						'faq_kws_pusaka_pemukiman_trad.nama_kegiatan',
						'faq_kws_pusaka_pemukiman_trad.thn_anggaran',
						'faq_kws_pusaka_pemukiman_trad.sumber_anggaran',
						'faq_kws_pusaka_pemukiman_trad.alokasi_anggaran',
						'faq_kws_pusaka_pemukiman_trad.volume_pekerjaan',
						'faq_kws_pusaka_pemukiman_trad.instansi_unit_organisasi_pelaksana',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kegiatan_proyek',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_lat',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_long',
						'faq_kws_pusaka_pemukiman_trad.status_aset',
						'faq_kws_pusaka_pemukiman_trad.biaya_pelaksanaan_kontraktor',
						'faq_kws_pusaka_pemukiman_trad.manajemen_konstruksi',
						'faq_kws_pusaka_pemukiman_trad.rencana_keu',
						'faq_kws_pusaka_pemukiman_trad.rencana_fisik',
						'faq_kws_pusaka_pemukiman_trad.dokumentasi',
						'faq_kws_pusaka_pemukiman_trad.tgl_input_wilayah',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_sk',
						'faq_kws_pusaka_pemukiman_trad.last_update',
                        'faq_kws_pusaka_pemukiman_trad.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_pusaka_pemukiman_trad.kws_pusaka_trad_id',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_id',
						'faq_kws_pusaka_pemukiman_trad.detail_kdprog_id',
						'faq_kws_pusaka_pemukiman_trad.thn_periode_keg',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kode',
						'faq_kws_pusaka_pemukiman_trad.nama_propinsi',
						'faq_kws_pusaka_pemukiman_trad.nama_kabupatenkota',
						'faq_kws_pusaka_pemukiman_trad.kd_struktur',
						'faq_kws_pusaka_pemukiman_trad.nama_kawasan',
						'faq_kws_pusaka_pemukiman_trad.jenis_kawasan',
						'faq_kws_pusaka_pemukiman_trad.nama_kegiatan',
						'faq_kws_pusaka_pemukiman_trad.thn_anggaran',
						'faq_kws_pusaka_pemukiman_trad.sumber_anggaran',
						'faq_kws_pusaka_pemukiman_trad.alokasi_anggaran',
						'faq_kws_pusaka_pemukiman_trad.volume_pekerjaan',
						'faq_kws_pusaka_pemukiman_trad.instansi_unit_organisasi_pelaksana',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kegiatan_proyek',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_lat',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_long',
						'faq_kws_pusaka_pemukiman_trad.status_aset',
						'faq_kws_pusaka_pemukiman_trad.biaya_pelaksanaan_kontraktor',
						'faq_kws_pusaka_pemukiman_trad.manajemen_konstruksi',
						'faq_kws_pusaka_pemukiman_trad.rencana_keu',
						'faq_kws_pusaka_pemukiman_trad.rencana_fisik',
						'faq_kws_pusaka_pemukiman_trad.dokumentasi',
						'faq_kws_pusaka_pemukiman_trad.tgl_input_wilayah',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_sk',
						'faq_kws_pusaka_pemukiman_trad.last_update',
                        'faq_kws_pusaka_pemukiman_trad.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqKwsPusakaPemukimanTradTransformer)->transformPaginate($model);
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

        $model->kws_pusaka_trad_id = $request->input('kws_pusaka_trad_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->nama_kawasan = $request->input('nama_kawasan');
		$model->jenis_kawasan = $request->input('jenis_kawasan');
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
                        'faq_kws_pusaka_pemukiman_trad.id',
                        'faq_kws_pusaka_pemukiman_trad.kws_pusaka_trad_id',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_id',
						'faq_kws_pusaka_pemukiman_trad.detail_kdprog_id',
						'faq_kws_pusaka_pemukiman_trad.thn_periode_keg',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kode',
						'faq_kws_pusaka_pemukiman_trad.nama_propinsi',
						'faq_kws_pusaka_pemukiman_trad.nama_kabupatenkota',
						'faq_kws_pusaka_pemukiman_trad.kd_struktur',
						'faq_kws_pusaka_pemukiman_trad.nama_kawasan',
						'faq_kws_pusaka_pemukiman_trad.jenis_kawasan',
						'faq_kws_pusaka_pemukiman_trad.nama_kegiatan',
						'faq_kws_pusaka_pemukiman_trad.thn_anggaran',
						'faq_kws_pusaka_pemukiman_trad.sumber_anggaran',
						'faq_kws_pusaka_pemukiman_trad.alokasi_anggaran',
						'faq_kws_pusaka_pemukiman_trad.volume_pekerjaan',
						'faq_kws_pusaka_pemukiman_trad.instansi_unit_organisasi_pelaksana',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kegiatan_proyek',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_lat',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_long',
						'faq_kws_pusaka_pemukiman_trad.status_aset',
						'faq_kws_pusaka_pemukiman_trad.biaya_pelaksanaan_kontraktor',
						'faq_kws_pusaka_pemukiman_trad.manajemen_konstruksi',
						'faq_kws_pusaka_pemukiman_trad.rencana_keu',
						'faq_kws_pusaka_pemukiman_trad.rencana_fisik',
						'faq_kws_pusaka_pemukiman_trad.dokumentasi',
						'faq_kws_pusaka_pemukiman_trad.tgl_input_wilayah',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_sk',
						'faq_kws_pusaka_pemukiman_trad.last_update',
                        'faq_kws_pusaka_pemukiman_trad.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_pusaka_pemukiman_trad.kws_pusaka_trad_id',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_id',
						'faq_kws_pusaka_pemukiman_trad.detail_kdprog_id',
						'faq_kws_pusaka_pemukiman_trad.thn_periode_keg',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kode',
						'faq_kws_pusaka_pemukiman_trad.nama_propinsi',
						'faq_kws_pusaka_pemukiman_trad.nama_kabupatenkota',
						'faq_kws_pusaka_pemukiman_trad.kd_struktur',
						'faq_kws_pusaka_pemukiman_trad.nama_kawasan',
						'faq_kws_pusaka_pemukiman_trad.jenis_kawasan',
						'faq_kws_pusaka_pemukiman_trad.nama_kegiatan',
						'faq_kws_pusaka_pemukiman_trad.thn_anggaran',
						'faq_kws_pusaka_pemukiman_trad.sumber_anggaran',
						'faq_kws_pusaka_pemukiman_trad.alokasi_anggaran',
						'faq_kws_pusaka_pemukiman_trad.volume_pekerjaan',
						'faq_kws_pusaka_pemukiman_trad.instansi_unit_organisasi_pelaksana',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kegiatan_proyek',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_lat',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_long',
						'faq_kws_pusaka_pemukiman_trad.status_aset',
						'faq_kws_pusaka_pemukiman_trad.biaya_pelaksanaan_kontraktor',
						'faq_kws_pusaka_pemukiman_trad.manajemen_konstruksi',
						'faq_kws_pusaka_pemukiman_trad.rencana_keu',
						'faq_kws_pusaka_pemukiman_trad.rencana_fisik',
						'faq_kws_pusaka_pemukiman_trad.dokumentasi',
						'faq_kws_pusaka_pemukiman_trad.tgl_input_wilayah',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_sk',
						'faq_kws_pusaka_pemukiman_trad.last_update',
                        'faq_kws_pusaka_pemukiman_trad.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqKwsPusakaPemukimanTradTransformer)->transformPaginate($model);
    }
}