<?php
namespace App\Models\Faq\FaqTabgCb;

use DB;
use File;

class FaqTabgCbRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-tabg-cb/file-sk-tabg-cb';

      
    public function __construct(
        FaqTabgCb $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_tabg_cb.id',
                        'faq_tabg_cb.tabg_cb_id',
						'faq_tabg_cb.info_wilayah_id',
						'faq_tabg_cb.detail_kdprog_id',
						'faq_tabg_cb.thn_periode_keg',
						'faq_tabg_cb.lokasi_kode',
						'faq_tabg_cb.nama_propinsi',
						'faq_tabg_cb.nama_kabupatenkota',
						'faq_tabg_cb.kd_struktur',
						'faq_tabg_cb.no_sk_tabg_cb',
						'faq_tabg_cb.tgl_sk_tabg_cb',
						'faq_tabg_cb.nama_pejabat',
						'faq_tabg_cb.jabatan',
						'faq_tabg_cb.nama_tabg_cb',
						'faq_tabg_cb.no_ktp_tabg_cb',
						'faq_tabg_cb.alamat_tabg_cb',
						'faq_tabg_cb.pendidikan_terakhir_tabg_cb',
						'faq_tabg_cb.jurusan_pendidikan_terakhir',
						'faq_tabg_cb.asal_universitas',
						'faq_tabg_cb.bidang_keahlian',
						'faq_tabg_cb.jabatan_dalam_tim',
						'faq_tabg_cb.keterangan',
						'faq_tabg_cb.file_sk_tabg_cb',
						'faq_tabg_cb.tgl_input_wilayah',
						'faq_tabg_cb.info_wilayah_sk',
						'faq_tabg_cb.last_update',
                        'faq_tabg_cb.is_actived'
                    )->searchOrder($request, [
                        'faq_tabg_cb.tabg_cb_id',
						'faq_tabg_cb.info_wilayah_id',
						'faq_tabg_cb.detail_kdprog_id',
						'faq_tabg_cb.thn_periode_keg',
						'faq_tabg_cb.lokasi_kode',
						'faq_tabg_cb.nama_propinsi',
						'faq_tabg_cb.nama_kabupatenkota',
						'faq_tabg_cb.kd_struktur',
						'faq_tabg_cb.no_sk_tabg_cb',
						'faq_tabg_cb.tgl_sk_tabg_cb',
						'faq_tabg_cb.nama_pejabat',
						'faq_tabg_cb.jabatan',
						'faq_tabg_cb.nama_tabg_cb',
						'faq_tabg_cb.no_ktp_tabg_cb',
						'faq_tabg_cb.alamat_tabg_cb',
						'faq_tabg_cb.pendidikan_terakhir_tabg_cb',
						'faq_tabg_cb.jurusan_pendidikan_terakhir',
						'faq_tabg_cb.asal_universitas',
						'faq_tabg_cb.bidang_keahlian',
						'faq_tabg_cb.jabatan_dalam_tim',
						'faq_tabg_cb.keterangan',
						'faq_tabg_cb.file_sk_tabg_cb',
						'faq_tabg_cb.tgl_input_wilayah',
						'faq_tabg_cb.info_wilayah_sk',
						'faq_tabg_cb.last_update',
                        'faq_tabg_cb.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqTabgCbTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('file_sk_tabg_cb')) {
			$image = $request->file('file_sk_tabg_cb');
			if (File::exists(public_path($model->file_sk_tabg_cb))) {
				File::delete(public_path($model->file_sk_tabg_cb));
			}
			$filename = str_slug($request->file_sk_tabg_cb).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_tabg_cb = $this->basePath1.'/'.$filename;
		}

        $model->tabg_cb_id = $request->input('tabg_cb_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->no_sk_tabg_cb = $request->input('no_sk_tabg_cb');
		$model->tgl_sk_tabg_cb = $request->input('tgl_sk_tabg_cb');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_tabg_cb = $request->input('nama_tabg_cb');
		$model->no_ktp_tabg_cb = $request->input('no_ktp_tabg_cb');
		$model->alamat_tabg_cb = $request->input('alamat_tabg_cb');
		$model->pendidikan_terakhir_tabg_cb = $request->input('pendidikan_terakhir_tabg_cb');
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
                        'faq_tabg_cb.id',
                        'faq_tabg_cb.tabg_cb_id',
						'faq_tabg_cb.info_wilayah_id',
						'faq_tabg_cb.detail_kdprog_id',
						'faq_tabg_cb.thn_periode_keg',
						'faq_tabg_cb.lokasi_kode',
						'faq_tabg_cb.nama_propinsi',
						'faq_tabg_cb.nama_kabupatenkota',
						'faq_tabg_cb.kd_struktur',
						'faq_tabg_cb.no_sk_tabg_cb',
						'faq_tabg_cb.tgl_sk_tabg_cb',
						'faq_tabg_cb.nama_pejabat',
						'faq_tabg_cb.jabatan',
						'faq_tabg_cb.nama_tabg_cb',
						'faq_tabg_cb.no_ktp_tabg_cb',
						'faq_tabg_cb.alamat_tabg_cb',
						'faq_tabg_cb.pendidikan_terakhir_tabg_cb',
						'faq_tabg_cb.jurusan_pendidikan_terakhir',
						'faq_tabg_cb.asal_universitas',
						'faq_tabg_cb.bidang_keahlian',
						'faq_tabg_cb.jabatan_dalam_tim',
						'faq_tabg_cb.keterangan',
						'faq_tabg_cb.file_sk_tabg_cb',
						'faq_tabg_cb.tgl_input_wilayah',
						'faq_tabg_cb.info_wilayah_sk',
						'faq_tabg_cb.last_update',
                        'faq_tabg_cb.is_actived'
                    )->searchOrder($request, [
                        'faq_tabg_cb.tabg_cb_id',
						'faq_tabg_cb.info_wilayah_id',
						'faq_tabg_cb.detail_kdprog_id',
						'faq_tabg_cb.thn_periode_keg',
						'faq_tabg_cb.lokasi_kode',
						'faq_tabg_cb.nama_propinsi',
						'faq_tabg_cb.nama_kabupatenkota',
						'faq_tabg_cb.kd_struktur',
						'faq_tabg_cb.no_sk_tabg_cb',
						'faq_tabg_cb.tgl_sk_tabg_cb',
						'faq_tabg_cb.nama_pejabat',
						'faq_tabg_cb.jabatan',
						'faq_tabg_cb.nama_tabg_cb',
						'faq_tabg_cb.no_ktp_tabg_cb',
						'faq_tabg_cb.alamat_tabg_cb',
						'faq_tabg_cb.pendidikan_terakhir_tabg_cb',
						'faq_tabg_cb.jurusan_pendidikan_terakhir',
						'faq_tabg_cb.asal_universitas',
						'faq_tabg_cb.bidang_keahlian',
						'faq_tabg_cb.jabatan_dalam_tim',
						'faq_tabg_cb.keterangan',
						'faq_tabg_cb.file_sk_tabg_cb',
						'faq_tabg_cb.tgl_input_wilayah',
						'faq_tabg_cb.info_wilayah_sk',
						'faq_tabg_cb.last_update',
                        'faq_tabg_cb.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqTabgCbTransformer)->transformPaginate($model);
    }
}