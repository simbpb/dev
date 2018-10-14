<?php
namespace App\Models\Detail\RegulasiPerda;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class RegulasiPerdaRepository
{

    protected $model;
    protected $program;
    protected $basePath1 = '/files/details/regulasi-perda/file-Perdabg';
protected $basePath2 = '/files/details/regulasi-perda/file-RTRW';
protected $basePath3 = '/files/details/regulasi-perda/file-RDTR';
protected $basePath4 = '/files/details/regulasi-perda/file-PerdaCagarBudaya';
protected $basePath5 = '/files/details/regulasi-perda/file-PerdaRTH';
protected $basePath6 = '/files/details/regulasi-perda/file-PerbupBGH';
protected $basePath7 = '/files/details/regulasi-perda/file-PerbupIMB';
protected $basePath8 = '/files/details/regulasi-perda/file-PerbupSLF';
protected $basePath9 = '/files/details/regulasi-perda/file-PerbupRTBL-1';
protected $basePath10 = '/files/details/regulasi-perda/file-PerbupRTBL-2';
protected $basePath11 = '/files/details/regulasi-perda/file-PerbupRTBL-3';
protected $basePath12 = '/files/details/regulasi-perda/file-PerbupRTBL-4';
protected $basePath13 = '/files/details/regulasi-perda/file-PerbupRTBL-5';
protected $basePath14 = '/files/details/regulasi-perda/file-PerbupRTBL-6';

      
    public function __construct(
        RegulasiPerda $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_regulasi_perda.id',
                        'tbl_detail_regulasi_perda.thn_periode_keg',
                        'tbl_detail_regulasi_perda.lokasi_kode',
                        'tbl_detail_regulasi_perda.nama_propinsi',
                        'tbl_detail_regulasi_perda.nama_kabupatenkota',
                        'tbl_detail_regulasi_perda.perda_bg',
						'tbl_detail_regulasi_perda.file_Perdabg',
						'tbl_detail_regulasi_perda.perda_rt_rw',
						'tbl_detail_regulasi_perda.file_RTRW',
						'tbl_detail_regulasi_perda.perda_rd_tr',
						'tbl_detail_regulasi_perda.file_RDTR',
						'tbl_detail_regulasi_perda.perda_cagar_budaya',
						'tbl_detail_regulasi_perda.file_PerdaCagarBudaya',
						'tbl_detail_regulasi_perda.perda_rth',
						'tbl_detail_regulasi_perda.file_PerdaRTH',
						'tbl_detail_regulasi_perda.perwal_perbup_bgh',
						'tbl_detail_regulasi_perda.file_PerbupBGH',
						'tbl_detail_regulasi_perda.perwal_perbup_imb',
						'tbl_detail_regulasi_perda.file_PerbupIMB',
						'tbl_detail_regulasi_perda.perwal_perbup_slf',
						'tbl_detail_regulasi_perda.file_PerbupSLF',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_1',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_1',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_2',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_2',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_3',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_3',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_4',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_4',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_5',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_5',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_6',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_6',
                        'tbl_detail_regulasi_perda.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_regulasi_perda.thn_periode_keg',
                        'tbl_detail_regulasi_perda.lokasi_kode',
                        'tbl_detail_regulasi_perda.nama_propinsi',
                        'tbl_detail_regulasi_perda.nama_kabupatenkota',
                        'tbl_detail_regulasi_perda.perda_bg',
						'tbl_detail_regulasi_perda.file_Perdabg',
						'tbl_detail_regulasi_perda.perda_rt_rw',
						'tbl_detail_regulasi_perda.file_RTRW',
						'tbl_detail_regulasi_perda.perda_rd_tr',
						'tbl_detail_regulasi_perda.file_RDTR',
						'tbl_detail_regulasi_perda.perda_cagar_budaya',
						'tbl_detail_regulasi_perda.file_PerdaCagarBudaya',
						'tbl_detail_regulasi_perda.perda_rth',
						'tbl_detail_regulasi_perda.file_PerdaRTH',
						'tbl_detail_regulasi_perda.perwal_perbup_bgh',
						'tbl_detail_regulasi_perda.file_PerbupBGH',
						'tbl_detail_regulasi_perda.perwal_perbup_imb',
						'tbl_detail_regulasi_perda.file_PerbupIMB',
						'tbl_detail_regulasi_perda.perwal_perbup_slf',
						'tbl_detail_regulasi_perda.file_PerbupSLF',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_1',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_1',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_2',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_2',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_3',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_3',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_4',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_4',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_5',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_5',
						'tbl_detail_regulasi_perda.perwal_perbup_rtbl_6',
						'tbl_detail_regulasi_perda.file_PerbupRTBL_6',
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
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_Perdabg')) {
			$image = $request->file('file_Perdabg');
			$filename = str_slug($request->file_Perdabg).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_Perdabg = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_RTRW')) {
			$image = $request->file('file_RTRW');
			$filename = str_slug($request->file_RTRW).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_RTRW = $this->basePath2.'/'.$filename;
		}

		if ($request->hasFile('file_RDTR')) {
			$image = $request->file('file_RDTR');
			$filename = str_slug($request->file_RDTR).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath3);
			$image->move($destinationPath, $filename);
			$model->file_RDTR = $this->basePath3.'/'.$filename;
		}

		if ($request->hasFile('file_PerdaCagarBudaya')) {
			$image = $request->file('file_PerdaCagarBudaya');
			$filename = str_slug($request->file_PerdaCagarBudaya).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath4);
			$image->move($destinationPath, $filename);
			$model->file_PerdaCagarBudaya = $this->basePath4.'/'.$filename;
		}

		if ($request->hasFile('file_PerdaRTH')) {
			$image = $request->file('file_PerdaRTH');
			$filename = str_slug($request->file_PerdaRTH).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath5);
			$image->move($destinationPath, $filename);
			$model->file_PerdaRTH = $this->basePath5.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupBGH')) {
			$image = $request->file('file_PerbupBGH');
			$filename = str_slug($request->file_PerbupBGH).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath6);
			$image->move($destinationPath, $filename);
			$model->file_PerbupBGH = $this->basePath6.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupIMB')) {
			$image = $request->file('file_PerbupIMB');
			$filename = str_slug($request->file_PerbupIMB).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath7);
			$image->move($destinationPath, $filename);
			$model->file_PerbupIMB = $this->basePath7.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupSLF')) {
			$image = $request->file('file_PerbupSLF');
			$filename = str_slug($request->file_PerbupSLF).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath8);
			$image->move($destinationPath, $filename);
			$model->file_PerbupSLF = $this->basePath8.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_1')) {
			$image = $request->file('file_PerbupRTBL_1');
			$filename = str_slug($request->file_PerbupRTBL_1).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath9);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_1 = $this->basePath9.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_2')) {
			$image = $request->file('file_PerbupRTBL_2');
			$filename = str_slug($request->file_PerbupRTBL_2).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath10);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_2 = $this->basePath10.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_3')) {
			$image = $request->file('file_PerbupRTBL_3');
			$filename = str_slug($request->file_PerbupRTBL_3).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath11);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_3 = $this->basePath11.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_4')) {
			$image = $request->file('file_PerbupRTBL_4');
			$filename = str_slug($request->file_PerbupRTBL_4).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath12);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_4 = $this->basePath12.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_5')) {
			$image = $request->file('file_PerbupRTBL_5');
			$filename = str_slug($request->file_PerbupRTBL_5).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath13);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_5 = $this->basePath13.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_6')) {
			$image = $request->file('file_PerbupRTBL_6');
			$filename = str_slug($request->file_PerbupRTBL_6).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath14);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_6 = $this->basePath14.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->renstra_id = $prog->renstra_id;
        $model->output_id = $prog->output_id;
        $model->suboutput_id = $prog->suboutput_id;
        $model->sasaran_id = $prog->sasaran_id;
        $model->uraian_id = $prog->uraian_id;
        $model->subdit_id = $prog->subdit_id;
        $model->volume_id = $prog->volume_id;
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

        $model->is_actived = $request->input('status');
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model->find($id);
        
        
		if ($request->hasFile('file_Perdabg')) {
			$image = $request->file('file_Perdabg');
			if (File::exists(public_path($model->file_Perdabg))) {
				File::delete(public_path($model->file_Perdabg));
			}
			$filename = str_slug($request->file_Perdabg).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_Perdabg = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_RTRW')) {
			$image = $request->file('file_RTRW');
			if (File::exists(public_path($model->file_RTRW))) {
				File::delete(public_path($model->file_RTRW));
			}
			$filename = str_slug($request->file_RTRW).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_RTRW = $this->basePath2.'/'.$filename;
		}

		if ($request->hasFile('file_RDTR')) {
			$image = $request->file('file_RDTR');
			if (File::exists(public_path($model->file_RDTR))) {
				File::delete(public_path($model->file_RDTR));
			}
			$filename = str_slug($request->file_RDTR).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath3);
			$image->move($destinationPath, $filename);
			$model->file_RDTR = $this->basePath3.'/'.$filename;
		}

		if ($request->hasFile('file_PerdaCagarBudaya')) {
			$image = $request->file('file_PerdaCagarBudaya');
			if (File::exists(public_path($model->file_PerdaCagarBudaya))) {
				File::delete(public_path($model->file_PerdaCagarBudaya));
			}
			$filename = str_slug($request->file_PerdaCagarBudaya).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath4);
			$image->move($destinationPath, $filename);
			$model->file_PerdaCagarBudaya = $this->basePath4.'/'.$filename;
		}

		if ($request->hasFile('file_PerdaRTH')) {
			$image = $request->file('file_PerdaRTH');
			if (File::exists(public_path($model->file_PerdaRTH))) {
				File::delete(public_path($model->file_PerdaRTH));
			}
			$filename = str_slug($request->file_PerdaRTH).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath5);
			$image->move($destinationPath, $filename);
			$model->file_PerdaRTH = $this->basePath5.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupBGH')) {
			$image = $request->file('file_PerbupBGH');
			if (File::exists(public_path($model->file_PerbupBGH))) {
				File::delete(public_path($model->file_PerbupBGH));
			}
			$filename = str_slug($request->file_PerbupBGH).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath6);
			$image->move($destinationPath, $filename);
			$model->file_PerbupBGH = $this->basePath6.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupIMB')) {
			$image = $request->file('file_PerbupIMB');
			if (File::exists(public_path($model->file_PerbupIMB))) {
				File::delete(public_path($model->file_PerbupIMB));
			}
			$filename = str_slug($request->file_PerbupIMB).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath7);
			$image->move($destinationPath, $filename);
			$model->file_PerbupIMB = $this->basePath7.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupSLF')) {
			$image = $request->file('file_PerbupSLF');
			if (File::exists(public_path($model->file_PerbupSLF))) {
				File::delete(public_path($model->file_PerbupSLF));
			}
			$filename = str_slug($request->file_PerbupSLF).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath8);
			$image->move($destinationPath, $filename);
			$model->file_PerbupSLF = $this->basePath8.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_1')) {
			$image = $request->file('file_PerbupRTBL_1');
			if (File::exists(public_path($model->file_PerbupRTBL_1))) {
				File::delete(public_path($model->file_PerbupRTBL_1));
			}
			$filename = str_slug($request->file_PerbupRTBL_1).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath9);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_1 = $this->basePath9.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_2')) {
			$image = $request->file('file_PerbupRTBL_2');
			if (File::exists(public_path($model->file_PerbupRTBL_2))) {
				File::delete(public_path($model->file_PerbupRTBL_2));
			}
			$filename = str_slug($request->file_PerbupRTBL_2).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath10);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_2 = $this->basePath10.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_3')) {
			$image = $request->file('file_PerbupRTBL_3');
			if (File::exists(public_path($model->file_PerbupRTBL_3))) {
				File::delete(public_path($model->file_PerbupRTBL_3));
			}
			$filename = str_slug($request->file_PerbupRTBL_3).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath11);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_3 = $this->basePath11.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_4')) {
			$image = $request->file('file_PerbupRTBL_4');
			if (File::exists(public_path($model->file_PerbupRTBL_4))) {
				File::delete(public_path($model->file_PerbupRTBL_4));
			}
			$filename = str_slug($request->file_PerbupRTBL_4).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath12);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_4 = $this->basePath12.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_5')) {
			$image = $request->file('file_PerbupRTBL_5');
			if (File::exists(public_path($model->file_PerbupRTBL_5))) {
				File::delete(public_path($model->file_PerbupRTBL_5));
			}
			$filename = str_slug($request->file_PerbupRTBL_5).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath13);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_5 = $this->basePath13.'/'.$filename;
		}

		if ($request->hasFile('file_PerbupRTBL_6')) {
			$image = $request->file('file_PerbupRTBL_6');
			if (File::exists(public_path($model->file_PerbupRTBL_6))) {
				File::delete(public_path($model->file_PerbupRTBL_6));
			}
			$filename = str_slug($request->file_PerbupRTBL_6).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath14);
			$image->move($destinationPath, $filename);
			$model->file_PerbupRTBL_6 = $this->basePath14.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->renstra_id = $prog->renstra_id;
        $model->output_id = $prog->output_id;
        $model->suboutput_id = $prog->suboutput_id;
        $model->sasaran_id = $prog->sasaran_id;
        $model->uraian_id = $prog->uraian_id;
        $model->subdit_id = $prog->subdit_id;
        $model->volume_id = $prog->volume_id;
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

        $model->is_actived = $request->input('status');
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