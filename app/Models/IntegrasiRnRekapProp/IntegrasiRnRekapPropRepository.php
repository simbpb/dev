<?php
namespace App\Models\IntegrasiRnRekapProp;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class IntegrasiRnRekapPropRepository
{

    protected $model;
    protected $kodifikasi;
    
      
    public function __construct(
        IntegrasiRnRekapProp $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'integrasi_rn_rekap_prop.id',
                        'integrasi_rn_rekap_prop.nama_propinsi',
						'integrasi_rn_rekap_prop.lokasi_kode',
						'integrasi_rn_rekap_prop.prop_sewa',
						'integrasi_rn_rekap_prop.prop_sewa_beli',
						'integrasi_rn_rekap_prop.prop_lunas',
						'integrasi_rn_rekap_prop.prop_hak_milik',
						'integrasi_rn_rekap_prop.total',
						'integrasi_rn_rekap_prop.created_date',
						'integrasi_rn_rekap_prop.updated_date'
                    )->searchOrder($request, [
                        'integrasi_rn_rekap_prop.nama_propinsi',
						'integrasi_rn_rekap_prop.lokasi_kode',
						'integrasi_rn_rekap_prop.prop_sewa',
						'integrasi_rn_rekap_prop.prop_sewa_beli',
						'integrasi_rn_rekap_prop.prop_lunas',
						'integrasi_rn_rekap_prop.prop_hak_milik',
						'integrasi_rn_rekap_prop.total',
						'integrasi_rn_rekap_prop.created_date',
						'integrasi_rn_rekap_prop.updated_date'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new IntegrasiRnRekapPropTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new IntegrasiRnRekapPropTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->id_rekap_prop = $request->input('id_rekap_prop');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->prop_sewa = $request->input('prop_sewa');
		$model->prop_sewa_beli = $request->input('prop_sewa_beli');
		$model->prop_lunas = $request->input('prop_lunas');
		$model->prop_hak_milik = $request->input('prop_hak_milik');
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
        
        

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->id_rekap_prop = $request->input('id_rekap_prop');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->prop_sewa = $request->input('prop_sewa');
		$model->prop_sewa_beli = $request->input('prop_sewa_beli');
		$model->prop_lunas = $request->input('prop_lunas');
		$model->prop_hak_milik = $request->input('prop_hak_milik');
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