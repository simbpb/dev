<?php
namespace App\Models\Detail\RehabBgPusakaIstana;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class RehabBgPusakaIstanaRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/rehab-bg-pusaka-istana/dokumentasi';

      
    public function __construct(
        RehabBgPusakaIstana $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_rehab_bg_pusaka_istana.id',
                        'tbl_detail_rehab_bg_pusaka_istana.thn_periode_keg',
                        'tbl_detail_rehab_bg_pusaka_istana.nama_propinsi',
                        'tbl_detail_rehab_bg_pusaka_istana.nama_kabupatenkota',
                        'tbl_detail_rehab_bg_pusaka_istana.nama_kegiatan',
						'tbl_detail_rehab_bg_pusaka_istana.thn_anggaran',
						'tbl_detail_rehab_bg_pusaka_istana.sumber_anggaran',
						'tbl_detail_rehab_bg_pusaka_istana.alokasi_anggaran',
						'tbl_detail_rehab_bg_pusaka_istana.volume_pekerjaan',
						'tbl_detail_rehab_bg_pusaka_istana.instansi_unit_organisasi_pelaksana',
						'tbl_detail_rehab_bg_pusaka_istana.lokasi_kegiatan_proyek',
						'tbl_detail_rehab_bg_pusaka_istana.titik_koordinat_lat',
						'tbl_detail_rehab_bg_pusaka_istana.titik_koordinat_long',
						'tbl_detail_rehab_bg_pusaka_istana.status_aset',
						'tbl_detail_rehab_bg_pusaka_istana.biaya_pelaksanaan_kontraktor',
						'tbl_detail_rehab_bg_pusaka_istana.manajemen_konstruksi',
						'tbl_detail_rehab_bg_pusaka_istana.rencana_keu',
						'tbl_detail_rehab_bg_pusaka_istana.rencana_fisik',
						'tbl_detail_rehab_bg_pusaka_istana.dokumentasi',
                        'tbl_detail_rehab_bg_pusaka_istana.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_rehab_bg_pusaka_istana.thn_periode_keg',
                        'tbl_detail_rehab_bg_pusaka_istana.nama_propinsi',
                        'tbl_detail_rehab_bg_pusaka_istana.nama_kabupatenkota',
                        'tbl_detail_rehab_bg_pusaka_istana.nama_kegiatan',
						'tbl_detail_rehab_bg_pusaka_istana.thn_anggaran',
						'tbl_detail_rehab_bg_pusaka_istana.sumber_anggaran',
						'tbl_detail_rehab_bg_pusaka_istana.alokasi_anggaran',
						'tbl_detail_rehab_bg_pusaka_istana.volume_pekerjaan',
						'tbl_detail_rehab_bg_pusaka_istana.instansi_unit_organisasi_pelaksana',
						'tbl_detail_rehab_bg_pusaka_istana.lokasi_kegiatan_proyek',
						'tbl_detail_rehab_bg_pusaka_istana.titik_koordinat_lat',
						'tbl_detail_rehab_bg_pusaka_istana.titik_koordinat_long',
						'tbl_detail_rehab_bg_pusaka_istana.status_aset',
						'tbl_detail_rehab_bg_pusaka_istana.biaya_pelaksanaan_kontraktor',
						'tbl_detail_rehab_bg_pusaka_istana.manajemen_konstruksi',
						'tbl_detail_rehab_bg_pusaka_istana.rencana_keu',
						'tbl_detail_rehab_bg_pusaka_istana.rencana_fisik',
						'tbl_detail_rehab_bg_pusaka_istana.dokumentasi',
                        'tbl_detail_rehab_bg_pusaka_istana.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new RehabBgPusakaIstanaTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new RehabBgPusakaIstanaTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
		if ($request->hasFile('dokumentasi')) {
			$image = $request->file('dokumentasi');
			$filename = str_slug($request->dokumentasi).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->dokumentasi = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
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
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
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