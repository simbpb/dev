<?php
namespace App\Models\Faq\FaqPelepasanRng3;

use DB;
use File;

class FaqPelepasanRng3Repository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sk-gol3';
protected $basePath2 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sip-gol3';
protected $basePath3 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sk-menteri-pupr';
protected $basePath4 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sk-hak-milik';

      
    public function __construct(
        FaqPelepasanRng3 $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pelepasan_rng3.id',
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    )->searchOrder($request, [
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqPelepasanRng3Transformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('file_upload_sk_gol3')) {
			$image = $request->file('file_upload_sk_gol3');
			if (File::exists(public_path($model->file_upload_sk_gol3))) {
				File::delete(public_path($model->file_upload_sk_gol3));
			}
			$filename = str_slug($request->file_upload_sk_gol3).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_upload_sk_gol3 = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_upload_sip_gol3')) {
			$image = $request->file('file_upload_sip_gol3');
			if (File::exists(public_path($model->file_upload_sip_gol3))) {
				File::delete(public_path($model->file_upload_sip_gol3));
			}
			$filename = str_slug($request->file_upload_sip_gol3).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_upload_sip_gol3 = $this->basePath2.'/'.$filename;
		}

		if ($request->hasFile('file_upload_sk_menteri_pupr')) {
			$image = $request->file('file_upload_sk_menteri_pupr');
			if (File::exists(public_path($model->file_upload_sk_menteri_pupr))) {
				File::delete(public_path($model->file_upload_sk_menteri_pupr));
			}
			$filename = str_slug($request->file_upload_sk_menteri_pupr).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath3);
			$image->move($destinationPath, $filename);
			$model->file_upload_sk_menteri_pupr = $this->basePath3.'/'.$filename;
		}

		if ($request->hasFile('file_upload_sk_hak_milik')) {
			$image = $request->file('file_upload_sk_hak_milik');
			if (File::exists(public_path($model->file_upload_sk_hak_milik))) {
				File::delete(public_path($model->file_upload_sk_hak_milik));
			}
			$filename = str_slug($request->file_upload_sk_hak_milik).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath4);
			$image->move($destinationPath, $filename);
			$model->file_upload_sk_hak_milik = $this->basePath4.'/'.$filename;
		}

        $model->pelepasan_rng3_id = $request->input('pelepasan_rng3_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->hdno_rn = $request->input('hdno_rn');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->kemen_lembaga = $request->input('kemen_lembaga');
		$model->nama_penghuni = $request->input('nama_penghuni');
		$model->alamat_rn = $request->input('alamat_rn');
		$model->no_sk_gol3 = $request->input('no_sk_gol3');
		$model->no_sip_gol3 = $request->input('no_sip_gol3');
		$model->no_sk_menteri_pupr = $request->input('no_sk_menteri_pupr');
		$model->thn_perjanjian_sewabeli = $request->input('thn_perjanjian_sewabeli');
		$model->status_rn = $request->input('status_rn');
		$model->thn_pelepasan_rng3 = $request->input('thn_pelepasan_rng3');
		$model->sk_hak_milik = $request->input('sk_hak_milik');
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
                        'faq_pelepasan_rng3.id',
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    )->searchOrder($request, [
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqPelepasanRng3Transformer)->transformPaginate($model);
    }
}