<?php
namespace App\Models\Detail\BgPusakaDanIstana;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class BgPusakaDanIstanaRepository
{

    protected $model;
    protected $program;
    protected $basePath1 = '/files/details/bg-pusaka-dan-istana/dokumentasi';

      
    public function __construct(
        BgPusakaDanIstana $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_bg_pusaka_dan_istana.id',
                        'tbl_detail_bg_pusaka_dan_istana.thn_periode_keg',
                        'tbl_detail_bg_pusaka_dan_istana.lokasi_kode',
                        'tbl_detail_bg_pusaka_dan_istana.nama_propinsi',
                        'tbl_detail_bg_pusaka_dan_istana.nama_kabupatenkota',
                        'tbl_detail_bg_pusaka_dan_istana.nama_kegiatan',
						'tbl_detail_bg_pusaka_dan_istana.thn_anggaran',
						'tbl_detail_bg_pusaka_dan_istana.sumber_anggaran',
						'tbl_detail_bg_pusaka_dan_istana.alokasi_anggaran',
						'tbl_detail_bg_pusaka_dan_istana.volume_pekerjaan',
						'tbl_detail_bg_pusaka_dan_istana.instansi_unit_organisasi_pelaksana',
						'tbl_detail_bg_pusaka_dan_istana.lokasi_kegiatan_proyek',
						'tbl_detail_bg_pusaka_dan_istana.titik_koordinat',
						'tbl_detail_bg_pusaka_dan_istana.status_aset',
						'tbl_detail_bg_pusaka_dan_istana.biaya_pelaksanaan_kontraktor',
						'tbl_detail_bg_pusaka_dan_istana.manajemen_konstruksi',
						'tbl_detail_bg_pusaka_dan_istana.rencana_keu',
						'tbl_detail_bg_pusaka_dan_istana.rencana_fisik',
						'tbl_detail_bg_pusaka_dan_istana.dokumentasi'
                    )->searchOrder($request, [
                        'tbl_detail_bg_pusaka_dan_istana.thn_periode_keg',
                        'tbl_detail_bg_pusaka_dan_istana.lokasi_kode',
                        'tbl_detail_bg_pusaka_dan_istana.nama_propinsi',
                        'tbl_detail_bg_pusaka_dan_istana.nama_kabupatenkota',
                        'tbl_detail_bg_pusaka_dan_istana.nama_kegiatan',
						'tbl_detail_bg_pusaka_dan_istana.thn_anggaran',
						'tbl_detail_bg_pusaka_dan_istana.sumber_anggaran',
						'tbl_detail_bg_pusaka_dan_istana.alokasi_anggaran',
						'tbl_detail_bg_pusaka_dan_istana.volume_pekerjaan',
						'tbl_detail_bg_pusaka_dan_istana.instansi_unit_organisasi_pelaksana',
						'tbl_detail_bg_pusaka_dan_istana.lokasi_kegiatan_proyek',
						'tbl_detail_bg_pusaka_dan_istana.titik_koordinat',
						'tbl_detail_bg_pusaka_dan_istana.status_aset',
						'tbl_detail_bg_pusaka_dan_istana.biaya_pelaksanaan_kontraktor',
						'tbl_detail_bg_pusaka_dan_istana.manajemen_konstruksi',
						'tbl_detail_bg_pusaka_dan_istana.rencana_keu',
						'tbl_detail_bg_pusaka_dan_istana.rencana_fisik',
						'tbl_detail_bg_pusaka_dan_istana.dokumentasi'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new BgPusakaDanIstanaTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new BgPusakaDanIstanaTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        
		if ($request->hasFile('dokumentasi')) {
			$image = $request->file('dokumentasi');
			$filename = str_slug($request->dokumentasi).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->dokumentasi = $this->basePath1.'/'.$filename;
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
        $model->nama_kegiatan = $request->input('nama_kegiatan');
$model->thn_anggaran = $request->input('thn_anggaran');
$model->sumber_anggaran = $request->input('sumber_anggaran');
$model->alokasi_anggaran = $request->input('alokasi_anggaran');
$model->volume_pekerjaan = $request->input('volume_pekerjaan');
$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
$model->titik_koordinat = $request->input('titik_koordinat');
$model->status_aset = $request->input('status_aset');
$model->biaya_pelaksanaan_kontraktor = $request->input('biaya_pelaksanaan_kontraktor');
$model->manajemen_konstruksi = $request->input('manajemen_konstruksi');
$model->rencana_keu = $request->input('rencana_keu');
$model->rencana_fisik = $request->input('rencana_fisik');

        $model->is_actived = 'ACTIVE';
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
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
        $model->nama_kegiatan = $request->input('nama_kegiatan');
$model->thn_anggaran = $request->input('thn_anggaran');
$model->sumber_anggaran = $request->input('sumber_anggaran');
$model->alokasi_anggaran = $request->input('alokasi_anggaran');
$model->volume_pekerjaan = $request->input('volume_pekerjaan');
$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
$model->titik_koordinat = $request->input('titik_koordinat');
$model->status_aset = $request->input('status_aset');
$model->biaya_pelaksanaan_kontraktor = $request->input('biaya_pelaksanaan_kontraktor');
$model->manajemen_konstruksi = $request->input('manajemen_konstruksi');
$model->rencana_keu = $request->input('rencana_keu');
$model->rencana_fisik = $request->input('rencana_fisik');

        $model->is_actived = 'ACTIVE';
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