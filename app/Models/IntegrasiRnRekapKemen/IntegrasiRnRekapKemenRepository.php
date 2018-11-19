<?php
namespace App\Models\IntegrasiRnRekapKemen;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class IntegrasiRnRekapKemenRepository
{

    protected $model;
    protected $kodifikasi;
    
      
    public function __construct(
        IntegrasiRnRekapKemen $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'integrasi_rn_rekap_kemen.id',
						'integrasi_rn_rekap_kemen.kemen_lembaga',
						'integrasi_rn_rekap_kemen.kemen_sewa',
						'integrasi_rn_rekap_kemen.kemen_sewa_beli',
						'integrasi_rn_rekap_kemen.kemen_lunas',
						'integrasi_rn_rekap_kemen.kemen_hak_milik',
						'integrasi_rn_rekap_kemen.total',
						'integrasi_rn_rekap_kemen.created_date',
						'integrasi_rn_rekap_kemen.updated_date'
                    )->searchOrder($request, [
						'integrasi_rn_rekap_kemen.kemen_lembaga',
						'integrasi_rn_rekap_kemen.kemen_sewa',
						'integrasi_rn_rekap_kemen.kemen_sewa_beli',
						'integrasi_rn_rekap_kemen.kemen_lunas',
						'integrasi_rn_rekap_kemen.kemen_hak_milik',
						'integrasi_rn_rekap_kemen.total',
						'integrasi_rn_rekap_kemen.created_date',
						'integrasi_rn_rekap_kemen.updated_date'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new IntegrasiRnRekapKemenTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new IntegrasiRnRekapKemenTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        $model->kd_struktur = $request->input('kd_struktur');
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
		$model->kemen_lembaga = $request->input('kemen_lembaga');
		$model->kemen_sewa = $request->input('kemen_sewa');
		$model->kemen_sewa_beli = $request->input('kemen_sewa_beli');
		$model->kemen_lunas = $request->input('kemen_lunas');
		$model->kemen_hak_milik = $request->input('kemen_hak_milik');
		$model->total = $request->input('total');
		$model->created_date = $request->input('created_date');
		$model->updated_date = $request->input('updated_date');
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
        
        $model->kd_struktur = $request->input('kd_struktur');
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->id_rekap_kemen = $request->input('id_rekap_kemen');
		$model->kemen_lembaga = $request->input('kemen_lembaga');
		$model->kemen_sewa = $request->input('kemen_sewa');
		$model->kemen_sewa_beli = $request->input('kemen_sewa_beli');
		$model->kemen_lunas = $request->input('kemen_lunas');
		$model->kemen_hak_milik = $request->input('kemen_hak_milik');
		$model->total = $request->input('total');
		$model->created_date = $request->input('created_date');
		$model->updated_date = $request->input('updated_date');
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