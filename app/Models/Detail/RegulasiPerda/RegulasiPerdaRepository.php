<?php
namespace App\Models\Detail\RegulasiPerda;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class RegulasiPerdaRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/regulasi-perda/file-perda-bg';
protected $basePath2 = '/files/details/regulasi-perda/file-rt-rw';
protected $basePath3 = '/files/details/regulasi-perda/file-rd-tr';
protected $basePath4 = '/files/details/regulasi-perda/file-perda-cagar-budaya';
protected $basePath5 = '/files/details/regulasi-perda/file-perda-rth';
protected $basePath6 = '/files/details/regulasi-perda/file-perbup-bgh';
protected $basePath7 = '/files/details/regulasi-perda/file-perbup-imb';
protected $basePath8 = '/files/details/regulasi-perda/file-perbup-slf';
protected $basePath9 = '/files/details/regulasi-perda/file-perbup-rtbl-1';
protected $basePath10 = '/files/details/regulasi-perda/file-perbup-rtbl-2';
protected $basePath11 = '/files/details/regulasi-perda/file-perbup-rtbl-3';
protected $basePath12 = '/files/details/regulasi-perda/file-perbup-rtbl-4';
protected $basePath13 = '/files/details/regulasi-perda/file-perbup-rtbl-5';
protected $basePath14 = '/files/details/regulasi-perda/file-perbup-rtbl-6';

      
    public function __construct(
        RegulasiPerda $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_regulasi_perda.id',
                        'tbl_detail_regulasi_perda.thn_periode_keg',
                        'tbl_detail_regulasi_perda.nama_propinsi',
                        'tbl_detail_regulasi_perda.nama_kabupatenkota',
                        'tbl_detail_regulasi_perda.perda_bg',
						'tbl_detail_regulasi_perda.file_perda_bg',
						'tbl_detail_regulasi_perda.perda_rt_rw',
						'tbl_detail_regulasi_perda.file_rt_rw',
						'tbl_detail_regulasi_perda.perda_rd_tr',
						'tbl_detail_regulasi_perda.file_rd_tr',
						'tbl_detail_regulasi_perda.perda_cagar_budaya',
						'tbl_detail_regulasi_perda.file_perda_cagar_budaya',
						'tbl_detail_regulasi_perda.perda_rth',
						'tbl_detail_regulasi_perda.file_perda_rth',
						'tbl_detail_regulasi_perda.perwal_perbup_bgh',
						'tbl_detail_regulasi_perda.file_perbup_bgh',
						'tbl_detail_regulasi_perda.perwal_perbup_imb',
						'tbl_detail_regulasi_perda.file_perbup_imb',
						'tbl_detail_regulasi_perda.perwal_perbup_slf',
						'tbl_detail_regulasi_perda.file_perbup_slf',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_1',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_1',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_2',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_2',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_3',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_3',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_4',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_4',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_5',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_5',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_6',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_6',
                        'tbl_detail_regulasi_perda.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_regulasi_perda.thn_periode_keg',
                        'tbl_detail_regulasi_perda.nama_propinsi',
                        'tbl_detail_regulasi_perda.nama_kabupatenkota',
                        'tbl_detail_regulasi_perda.perda_bg',
						'tbl_detail_regulasi_perda.file_perda_bg',
						'tbl_detail_regulasi_perda.perda_rt_rw',
						'tbl_detail_regulasi_perda.file_rt_rw',
						'tbl_detail_regulasi_perda.perda_rd_tr',
						'tbl_detail_regulasi_perda.file_rd_tr',
						'tbl_detail_regulasi_perda.perda_cagar_budaya',
						'tbl_detail_regulasi_perda.file_perda_cagar_budaya',
						'tbl_detail_regulasi_perda.perda_rth',
						'tbl_detail_regulasi_perda.file_perda_rth',
						'tbl_detail_regulasi_perda.perwal_perbup_bgh',
						'tbl_detail_regulasi_perda.file_perbup_bgh',
						'tbl_detail_regulasi_perda.perwal_perbup_imb',
						'tbl_detail_regulasi_perda.file_perbup_imb',
						'tbl_detail_regulasi_perda.perwal_perbup_slf',
						'tbl_detail_regulasi_perda.file_perbup_slf',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_1',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_1',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_2',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_2',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_3',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_3',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_4',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_4',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_5',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_5',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_6',
						'tbl_detail_regulasi_perda.file_perbup_rtbl_6',
                        'tbl_detail_regulasi_perda.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new RegulasiPerdaTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new RegulasiPerdaTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_perda_bg')) {
			$image = $request->file('file_perda_bg');
			$filename = str_slug($request->file_perda_bg).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_perda_bg = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_rt_rw')) {
			$image = $request->file('file_rt_rw');
			$filename = str_slug($request->file_rt_rw).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_rt_rw = $this->basePath2.'/'.$filename;
		}

		if ($request->hasFile('file_rd_tr')) {
			$image = $request->file('file_rd_tr');
			$filename = str_slug($request->file_rd_tr).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath3);
			$image->move($destinationPath, $filename);
			$model->file_rd_tr = $this->basePath3.'/'.$filename;
		}

		if ($request->hasFile('file_perda_cagar_budaya')) {
			$image = $request->file('file_perda_cagar_budaya');
			$filename = str_slug($request->file_perda_cagar_budaya).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath4);
			$image->move($destinationPath, $filename);
			$model->file_perda_cagar_budaya = $this->basePath4.'/'.$filename;
		}

		if ($request->hasFile('file_perda_rth')) {
			$image = $request->file('file_perda_rth');
			$filename = str_slug($request->file_perda_rth).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath5);
			$image->move($destinationPath, $filename);
			$model->file_perda_rth = $this->basePath5.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_bgh')) {
			$image = $request->file('file_perbup_bgh');
			$filename = str_slug($request->file_perbup_bgh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath6);
			$image->move($destinationPath, $filename);
			$model->file_perbup_bgh = $this->basePath6.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_imb')) {
			$image = $request->file('file_perbup_imb');
			$filename = str_slug($request->file_perbup_imb).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath7);
			$image->move($destinationPath, $filename);
			$model->file_perbup_imb = $this->basePath7.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_slf')) {
			$image = $request->file('file_perbup_slf');
			$filename = str_slug($request->file_perbup_slf).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath8);
			$image->move($destinationPath, $filename);
			$model->file_perbup_slf = $this->basePath8.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_1')) {
			$image = $request->file('file_perbup_rtbl_1');
			$filename = str_slug($request->file_perbup_rtbl_1).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath9);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_1 = $this->basePath9.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_2')) {
			$image = $request->file('file_perbup_rtbl_2');
			$filename = str_slug($request->file_perbup_rtbl_2).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath10);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_2 = $this->basePath10.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_3')) {
			$image = $request->file('file_perbup_rtbl_3');
			$filename = str_slug($request->file_perbup_rtbl_3).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath11);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_3 = $this->basePath11.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_4')) {
			$image = $request->file('file_perbup_rtbl_4');
			$filename = str_slug($request->file_perbup_rtbl_4).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath12);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_4 = $this->basePath12.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_5')) {
			$image = $request->file('file_perbup_rtbl_5');
			$filename = str_slug($request->file_perbup_rtbl_5).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath13);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_5 = $this->basePath13.'/'.$filename;
		}

		if ($request->hasFile('file_perbup_rtbl_6')) {
			$image = $request->file('file_perbup_rtbl_6');
			$filename = str_slug($request->file_perbup_rtbl_6).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath14);
			$image->move($destinationPath, $filename);
			$model->file_perbup_rtbl_6 = $this->basePath14.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
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
		
        $model->is_actived = !empty($request->input('status')) ? '1' : '0';
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
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


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
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
		
        $model->is_actived = !empty($request->input('status')) ? '1' : '0';
        $model->save();
        
        DB::commit();
        return true;
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->delete();
        DB::commit();
        return true;
    }
}