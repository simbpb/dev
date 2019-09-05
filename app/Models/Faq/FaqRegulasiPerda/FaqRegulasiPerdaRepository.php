<?php
namespace App\Models\Faq\FaqRegulasiPerda;

use DB;
use File;

class FaqRegulasiPerdaRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-regulasi-perda/file-perda-bg';
protected $basePath2 = '/files/faqs/faq-regulasi-perda/file-rt-rw';
protected $basePath3 = '/files/faqs/faq-regulasi-perda/file-rd-tr';
protected $basePath4 = '/files/faqs/faq-regulasi-perda/file-perda-cagar-budaya';
protected $basePath5 = '/files/faqs/faq-regulasi-perda/file-perda-rth';
protected $basePath6 = '/files/faqs/faq-regulasi-perda/file-perbup-bgh';
protected $basePath7 = '/files/faqs/faq-regulasi-perda/file-perbup-imb';
protected $basePath8 = '/files/faqs/faq-regulasi-perda/file-perbup-slf';
protected $basePath9 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-1';
protected $basePath10 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-2';
protected $basePath11 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-3';
protected $basePath12 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-4';
protected $basePath13 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-5';
protected $basePath14 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-6';

      
    public function __construct(
        FaqRegulasiPerda $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_regulasi_perda.id',
                        'faq_regulasi_perda.regulasi_perda_id',
						'faq_regulasi_perda.info_wilayah_id',
						'faq_regulasi_perda.detail_kdprog_id',
						'faq_regulasi_perda.thn_periode_keg',
						'faq_regulasi_perda.lokasi_kode',
						'faq_regulasi_perda.nama_propinsi',
						'faq_regulasi_perda.nama_kabupatenkota',
						'faq_regulasi_perda.kd_struktur',
						'faq_regulasi_perda.perda_bg',
						'faq_regulasi_perda.file_perda_bg',
						'faq_regulasi_perda.perda_rt_rw',
						'faq_regulasi_perda.file_rt_rw',
						'faq_regulasi_perda.perda_rd_tr',
						'faq_regulasi_perda.file_rd_tr',
						'faq_regulasi_perda.perda_cagar_budaya',
						'faq_regulasi_perda.file_perda_cagar_budaya',
						'faq_regulasi_perda.perda_rth',
						'faq_regulasi_perda.file_perda_rth',
						'faq_regulasi_perda.perwal_perbup_bgh',
						'faq_regulasi_perda.file_perbup_bgh',
						'faq_regulasi_perda.perwal_perbup_imb',
						'faq_regulasi_perda.file_perbup_imb',
						'faq_regulasi_perda.perwal_perbup_slf',
						'faq_regulasi_perda.file_perbup_slf',
						'faq_regulasi_perda.perwal_perbup_rtbl_1',
						'faq_regulasi_perda.file_perbup_rtbl_1',
						'faq_regulasi_perda.perwal_perbup_rtbl_2',
						'faq_regulasi_perda.file_perbup_rtbl_2',
						'faq_regulasi_perda.perwal_perbup_rtbl_3',
						'faq_regulasi_perda.file_perbup_rtbl_3',
						'faq_regulasi_perda.perwal_perbup_rtbl_4',
						'faq_regulasi_perda.file_perbup_rtbl_4',
						'faq_regulasi_perda.perwal_perbup_rtbl_5',
						'faq_regulasi_perda.file_perbup_rtbl_5',
						'faq_regulasi_perda.perwal_perbup_rtbl_6',
						'faq_regulasi_perda.file_perbup_rtbl_6',
						'faq_regulasi_perda.tgl_input_wilayah',
						'faq_regulasi_perda.info_wilayah_sk',
						'faq_regulasi_perda.last_update',
                        'faq_regulasi_perda.is_actived'
                    )->searchOrder($request, [
                        'faq_regulasi_perda.regulasi_perda_id',
						'faq_regulasi_perda.info_wilayah_id',
						'faq_regulasi_perda.detail_kdprog_id',
						'faq_regulasi_perda.thn_periode_keg',
						'faq_regulasi_perda.lokasi_kode',
						'faq_regulasi_perda.nama_propinsi',
						'faq_regulasi_perda.nama_kabupatenkota',
						'faq_regulasi_perda.kd_struktur',
						'faq_regulasi_perda.perda_bg',
						'faq_regulasi_perda.file_perda_bg',
						'faq_regulasi_perda.perda_rt_rw',
						'faq_regulasi_perda.file_rt_rw',
						'faq_regulasi_perda.perda_rd_tr',
						'faq_regulasi_perda.file_rd_tr',
						'faq_regulasi_perda.perda_cagar_budaya',
						'faq_regulasi_perda.file_perda_cagar_budaya',
						'faq_regulasi_perda.perda_rth',
						'faq_regulasi_perda.file_perda_rth',
						'faq_regulasi_perda.perwal_perbup_bgh',
						'faq_regulasi_perda.file_perbup_bgh',
						'faq_regulasi_perda.perwal_perbup_imb',
						'faq_regulasi_perda.file_perbup_imb',
						'faq_regulasi_perda.perwal_perbup_slf',
						'faq_regulasi_perda.file_perbup_slf',
						'faq_regulasi_perda.perwal_perbup_rtbl_1',
						'faq_regulasi_perda.file_perbup_rtbl_1',
						'faq_regulasi_perda.perwal_perbup_rtbl_2',
						'faq_regulasi_perda.file_perbup_rtbl_2',
						'faq_regulasi_perda.perwal_perbup_rtbl_3',
						'faq_regulasi_perda.file_perbup_rtbl_3',
						'faq_regulasi_perda.perwal_perbup_rtbl_4',
						'faq_regulasi_perda.file_perbup_rtbl_4',
						'faq_regulasi_perda.perwal_perbup_rtbl_5',
						'faq_regulasi_perda.file_perbup_rtbl_5',
						'faq_regulasi_perda.perwal_perbup_rtbl_6',
						'faq_regulasi_perda.file_perbup_rtbl_6',
						'faq_regulasi_perda.tgl_input_wilayah',
						'faq_regulasi_perda.info_wilayah_sk',
						'faq_regulasi_perda.last_update',
                        'faq_regulasi_perda.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRegulasiPerdaTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('file_perda_bg')) {
			$image = $request->file('file_perda_bg');
			if (File::exists(public_path($model->file_perda_bg))) {
				File::delete(public_path($model->file_perda_bg));
			}
			$filename = str_slug($request->file_perda_bg).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_perda_bg = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_rt_rw')) {
			$image = $request->file('file_rt_rw');
			if (File::exists(public_path($model->file_rt_rw))) {
				File::delete(public_path($model->file_rt_rw));
			}
			$filename = str_slug($request->file_rt_rw).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_rt_rw = $this->basePath2.'/'.$filename;
		}

		if ($request->hasFile('file_rd_tr')) {
			$image = $request->file('file_rd_tr');
			if (File::exists(public_path($model->file_rd_tr))) {
				File::delete(public_path($model->file_rd_tr));
			}
			$filename = str_slug($request->file_rd_tr).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath3);
			$image->move($destinationPath, $filename);
			$model->file_rd_tr = $this->basePath3.'/'.$filename;
		}

		if ($request->hasFile('file_perda_cagar_budaya')) {
			$image = $request->file('file_perda_cagar_budaya');
			if (File::exists(public_path($model->file_perda_cagar_budaya))) {
				File::delete(public_path($model->file_perda_cagar_budaya));
			}
			$filename = str_slug($request->file_perda_cagar_budaya).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath4);
			$image->move($destinationPath, $filename);
			$model->file_perda_cagar_budaya = $this->basePath4.'/'.$filename;
		}

		if ($request->hasFile('file_perda_rth')) {
			$image = $request->file('file_perda_rth');
			if (File::exists(public_path($model->file_perda_rth))) {
				File::delete(public_path($model->file_perda_rth));
			}
			$filename = str_slug($request->file_perda_rth).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath5);
			$image->move($destinationPath, $filename);
			$model->file_perda_rth = $this->basePath5.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_bgh')) {
			$image = $request->file('file_perbup_bgh');
			if (File::exists(public_path($model->file_perbup_bgh))) {
				File::delete(public_path($model->file_perbup_bgh));
			}
			$filename = str_slug($request->file_perbup_bgh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath6);
			$image->move($destinationPath, $filename);
			$model->file_perbup_bgh = $this->basePath6.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_imb')) {
			$image = $request->file('file_perbup_imb');
			if (File::exists(public_path($model->file_perbup_imb))) {
				File::delete(public_path($model->file_perbup_imb));
			}
			$filename = str_slug($request->file_perbup_imb).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath7);
			$image->move($destinationPath, $filename);
			$model->file_perbup_imb = $this->basePath7.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_slf')) {
			$image = $request->file('file_perbup_slf');
			if (File::exists(public_path($model->file_perbup_slf))) {
				File::delete(public_path($model->file_perbup_slf));
			}
			$filename = str_slug($request->file_perbup_slf).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath8);
			$image->move($destinationPath, $filename);
			$model->file_perbup_slf = $this->basePath8.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_1')) {
			$image = $request->file('file_perbup_rtbl_1');
			if (File::exists(public_path($model->file_perbup_rtbl_1))) {
				File::delete(public_path($model->file_perbup_rtbl_1));
			}
			$filename = str_slug($request->file_perbup_rtbl_1).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath9);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_1 = $this->basePath9.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_2')) {
			$image = $request->file('file_perbup_rtbl_2');
			if (File::exists(public_path($model->file_perbup_rtbl_2))) {
				File::delete(public_path($model->file_perbup_rtbl_2));
			}
			$filename = str_slug($request->file_perbup_rtbl_2).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath10);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_2 = $this->basePath10.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_3')) {
			$image = $request->file('file_perbup_rtbl_3');
			if (File::exists(public_path($model->file_perbup_rtbl_3))) {
				File::delete(public_path($model->file_perbup_rtbl_3));
			}
			$filename = str_slug($request->file_perbup_rtbl_3).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath11);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_3 = $this->basePath11.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_4')) {
			$image = $request->file('file_perbup_rtbl_4');
			if (File::exists(public_path($model->file_perbup_rtbl_4))) {
				File::delete(public_path($model->file_perbup_rtbl_4));
			}
			$filename = str_slug($request->file_perbup_rtbl_4).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath12);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_4 = $this->basePath12.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_5')) {
			$image = $request->file('file_perbup_rtbl_5');
			if (File::exists(public_path($model->file_perbup_rtbl_5))) {
				File::delete(public_path($model->file_perbup_rtbl_5));
			}
			$filename = str_slug($request->file_perbup_rtbl_5).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath13);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_5 = $this->basePath13.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_6')) {
			$image = $request->file('file_perbup_rtbl_6');
			if (File::exists(public_path($model->file_perbup_rtbl_6))) {
				File::delete(public_path($model->file_perbup_rtbl_6));
			}
			$filename = str_slug($request->file_perbup_rtbl_6).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath14);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_6 = $this->basePath14.'/'.$filename;
		}

        $model->regulasi_perda_id = $request->input('regulasi_perda_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->perda_bg = $request->input('perda_bg');
		$model->perda_rt_rw = $request->input('perda_rt_rw');
		$model->perda_rd_tr = $request->input('perda_rd_tr');
		$model->perda_cagar_budaya = $request->input('perda_cagar_budaya');
		$model->perda_rth = $request->input('perda_rth');
		$model->perwal_perbup_bgh = $request->input('perwal_perbup_bgh');
		$model->perwal_perbup_imb = $request->input('perwal_perbup_imb');
		$model->perwal_perbup_slf = $request->input('perwal_perbup_slf');
		$model->perwal_perbup_rtbl_1 = $request->input('perwal_perbup_rtbl_1');
		$model->perwal_perbup_rtbl_2 = $request->input('perwal_perbup_rtbl_2');
		$model->perwal_perbup_rtbl_3 = $request->input('perwal_perbup_rtbl_3');
		$model->perwal_perbup_rtbl_4 = $request->input('perwal_perbup_rtbl_4');
		$model->perwal_perbup_rtbl_5 = $request->input('perwal_perbup_rtbl_5');
		$model->perwal_perbup_rtbl_6 = $request->input('perwal_perbup_rtbl_6');
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
                        'faq_regulasi_perda.id',
                        'faq_regulasi_perda.regulasi_perda_id',
						'faq_regulasi_perda.info_wilayah_id',
						'faq_regulasi_perda.detail_kdprog_id',
						'faq_regulasi_perda.thn_periode_keg',
						'faq_regulasi_perda.lokasi_kode',
						'faq_regulasi_perda.nama_propinsi',
						'faq_regulasi_perda.nama_kabupatenkota',
						'faq_regulasi_perda.kd_struktur',
						'faq_regulasi_perda.perda_bg',
						'faq_regulasi_perda.file_perda_bg',
						'faq_regulasi_perda.perda_rt_rw',
						'faq_regulasi_perda.file_rt_rw',
						'faq_regulasi_perda.perda_rd_tr',
						'faq_regulasi_perda.file_rd_tr',
						'faq_regulasi_perda.perda_cagar_budaya',
						'faq_regulasi_perda.file_perda_cagar_budaya',
						'faq_regulasi_perda.perda_rth',
						'faq_regulasi_perda.file_perda_rth',
						'faq_regulasi_perda.perwal_perbup_bgh',
						'faq_regulasi_perda.file_perbup_bgh',
						'faq_regulasi_perda.perwal_perbup_imb',
						'faq_regulasi_perda.file_perbup_imb',
						'faq_regulasi_perda.perwal_perbup_slf',
						'faq_regulasi_perda.file_perbup_slf',
						'faq_regulasi_perda.perwal_perbup_rtbl_1',
						'faq_regulasi_perda.file_perbup_rtbl_1',
						'faq_regulasi_perda.perwal_perbup_rtbl_2',
						'faq_regulasi_perda.file_perbup_rtbl_2',
						'faq_regulasi_perda.perwal_perbup_rtbl_3',
						'faq_regulasi_perda.file_perbup_rtbl_3',
						'faq_regulasi_perda.perwal_perbup_rtbl_4',
						'faq_regulasi_perda.file_perbup_rtbl_4',
						'faq_regulasi_perda.perwal_perbup_rtbl_5',
						'faq_regulasi_perda.file_perbup_rtbl_5',
						'faq_regulasi_perda.perwal_perbup_rtbl_6',
						'faq_regulasi_perda.file_perbup_rtbl_6',
						'faq_regulasi_perda.tgl_input_wilayah',
						'faq_regulasi_perda.info_wilayah_sk',
						'faq_regulasi_perda.last_update',
                        'faq_regulasi_perda.is_actived'
                    )->searchOrder($request, [
                        'faq_regulasi_perda.regulasi_perda_id',
						'faq_regulasi_perda.info_wilayah_id',
						'faq_regulasi_perda.detail_kdprog_id',
						'faq_regulasi_perda.thn_periode_keg',
						'faq_regulasi_perda.lokasi_kode',
						'faq_regulasi_perda.nama_propinsi',
						'faq_regulasi_perda.nama_kabupatenkota',
						'faq_regulasi_perda.kd_struktur',
						'faq_regulasi_perda.perda_bg',
						'faq_regulasi_perda.file_perda_bg',
						'faq_regulasi_perda.perda_rt_rw',
						'faq_regulasi_perda.file_rt_rw',
						'faq_regulasi_perda.perda_rd_tr',
						'faq_regulasi_perda.file_rd_tr',
						'faq_regulasi_perda.perda_cagar_budaya',
						'faq_regulasi_perda.file_perda_cagar_budaya',
						'faq_regulasi_perda.perda_rth',
						'faq_regulasi_perda.file_perda_rth',
						'faq_regulasi_perda.perwal_perbup_bgh',
						'faq_regulasi_perda.file_perbup_bgh',
						'faq_regulasi_perda.perwal_perbup_imb',
						'faq_regulasi_perda.file_perbup_imb',
						'faq_regulasi_perda.perwal_perbup_slf',
						'faq_regulasi_perda.file_perbup_slf',
						'faq_regulasi_perda.perwal_perbup_rtbl_1',
						'faq_regulasi_perda.file_perbup_rtbl_1',
						'faq_regulasi_perda.perwal_perbup_rtbl_2',
						'faq_regulasi_perda.file_perbup_rtbl_2',
						'faq_regulasi_perda.perwal_perbup_rtbl_3',
						'faq_regulasi_perda.file_perbup_rtbl_3',
						'faq_regulasi_perda.perwal_perbup_rtbl_4',
						'faq_regulasi_perda.file_perbup_rtbl_4',
						'faq_regulasi_perda.perwal_perbup_rtbl_5',
						'faq_regulasi_perda.file_perbup_rtbl_5',
						'faq_regulasi_perda.perwal_perbup_rtbl_6',
						'faq_regulasi_perda.file_perbup_rtbl_6',
						'faq_regulasi_perda.tgl_input_wilayah',
						'faq_regulasi_perda.info_wilayah_sk',
						'faq_regulasi_perda.last_update',
                        'faq_regulasi_perda.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqRegulasiPerdaTransformer)->transformPaginate($model);
    }
}