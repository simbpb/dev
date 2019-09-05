<?php
namespace App\Models\IntegrasiRn;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class IntegrasiRnRepository
{

    protected $model;
    protected $kodifikasi;
    
      
    public function __construct(
        IntegrasiRn $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'integrasi_rn.id',
                        'integrasi_rn.nama_propinsi',
                        'integrasi_rn.nama_kabupatenkota',
						'integrasi_rn.hdno_rn',
						'integrasi_rn.nama_penghuni',
						'integrasi_rn.alamat_rn',
						'integrasi_rn.kemen_lembaga',
						'integrasi_rn.nama_kecamatan',
						'integrasi_rn.status_rn',
						'integrasi_rn.created_date',
						'integrasi_rn.updated_date'
                    )->searchOrder($request, [
                        'integrasi_rn.nama_propinsi',
                        'integrasi_rn.nama_kabupatenkota',
						'integrasi_rn.hdno_rn',
						'integrasi_rn.nama_penghuni',
						'integrasi_rn.alamat_rn',
						'integrasi_rn.kemen_lembaga',
						'integrasi_rn.nama_kecamatan',
						'integrasi_rn.status_rn',
						'integrasi_rn.created_date',
						'integrasi_rn.updated_date'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new IntegrasiRnTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new IntegrasiRnTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        $model->kd_struktur = $request->input('kd_struktur');
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->id_rn = $request->input('id_rn');
		$model->hdno_rn = $request->input('hdno_rn');
		$model->nama_penghuni = $request->input('nama_penghuni');
		$model->alamat_rn = $request->input('alamat_rn');
		$model->kemen_lembaga = $request->input('kemen_lembaga');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->status_rn = $request->input('status_rn');
		$model->created_date = $request->input('created_date');
		$model->updated_date = $request->input('updated_date');
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model->find($id);
        
        $model->kd_struktur = $request->input('kd_struktur');
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->id_rn = $request->input('id_rn');
		$model->hdno_rn = $request->input('hdno_rn');
		$model->nama_penghuni = $request->input('nama_penghuni');
		$model->alamat_rn = $request->input('alamat_rn');
		$model->kemen_lembaga = $request->input('kemen_lembaga');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->status_rn = $request->input('status_rn');
		$model->created_date = $request->input('created_date');
		$model->updated_date = $request->input('updated_date');
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