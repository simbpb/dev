<?php
namespace App\Models\Faq\FaqTabg;

use DB;
use File;

class FaqTabgRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-tabg/file-sk-tabg';

      
    public function __construct(
        FaqTabg $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_tabg.id',
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    )->searchOrder($request, [
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqTabgTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('file_sk_tabg')) {
			$image = $request->file('file_sk_tabg');
			if (File::exists(public_path($model->file_sk_tabg))) {
				File::delete(public_path($model->file_sk_tabg));
			}
			$filename = str_slug($request->file_sk_tabg).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_tabg = $this->basePath1.'/'.$filename;
		}

        $model->tabg_id = $request->input('tabg_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->no_sk_tabg = $request->input('no_sk_tabg');
		$model->tgl_sk_tabg = $request->input('tgl_sk_tabg');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_tabg = $request->input('nama_tabg');
		$model->no_ktp_tabg = $request->input('no_ktp_tabg');
		$model->alamat_tabg = $request->input('alamat_tabg');
		$model->pendidikan_terakhir_tabg = $request->input('pendidikan_terakhir_tabg');
		$model->jurusan_pendidikan_terakhir = $request->input('jurusan_pendidikan_terakhir');
		$model->asal_universitas = $request->input('asal_universitas');
		$model->bidang_keahlian = $request->input('bidang_keahlian');
		$model->jabatan_dalam_tim = $request->input('jabatan_dalam_tim');
		$model->keterangan = $request->input('keterangan');
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
                        'faq_tabg.id',
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    )->searchOrder($request, [
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqTabgTransformer)->transformPaginate($model);
    }
}