<?php
namespace App\Models\IntegrasiFactPerdabg;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class IntegrasiFactPerdabgRepository
{

    protected $model;
    protected $kodifikasi;
    
      
    public function __construct(
        IntegrasiFactPerdabg $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'integrasi_fact_perdabg.id',
                        'integrasi_fact_perdabg.nama_propinsi',
                        'integrasi_fact_perdabg.nama_kabupatenkota',
                        'integrasi_fact_perdabg.id_perda_bg',
						'integrasi_fact_perdabg.id_info_wilayah',
						'integrasi_fact_perdabg.lokasi_kode',
						'integrasi_fact_perdabg.uraian',
						'integrasi_fact_perdabg.klasifikasi_berdasarkan_sasaran_utama',
						'integrasi_fact_perdabg.status_perdabg',
						'integrasi_fact_perdabg.keterangan',
						'integrasi_fact_perdabg.tgl_input_perdabg',
						'integrasi_fact_perdabg.tahun_perdabg',
						'integrasi_fact_perdabg.no_perdabg',
						'integrasi_fact_perdabg.luas_wilayah',
						'integrasi_fact_perdabg.angka_luas_wilayah',
						'integrasi_fact_perdabg.satuan_luas_wilayah',
						'integrasi_fact_perdabg.isActive',
						'integrasi_fact_perdabg.perdabg_sk',
						'integrasi_fact_perdabg.last_update'
                    )->searchOrder($request, [
                        'integrasi_fact_perdabg.nama_propinsi',
                        'integrasi_fact_perdabg.nama_kabupatenkota',
                        'integrasi_fact_perdabg.id_perda_bg',
						'integrasi_fact_perdabg.id_info_wilayah',
						'integrasi_fact_perdabg.lokasi_kode',
						'integrasi_fact_perdabg.uraian',
						'integrasi_fact_perdabg.klasifikasi_berdasarkan_sasaran_utama',
						'integrasi_fact_perdabg.status_perdabg',
						'integrasi_fact_perdabg.keterangan',
						'integrasi_fact_perdabg.tgl_input_perdabg',
						'integrasi_fact_perdabg.tahun_perdabg',
						'integrasi_fact_perdabg.no_perdabg',
						'integrasi_fact_perdabg.luas_wilayah',
						'integrasi_fact_perdabg.angka_luas_wilayah',
						'integrasi_fact_perdabg.satuan_luas_wilayah',
						'integrasi_fact_perdabg.isActive',
						'integrasi_fact_perdabg.perdabg_sk',
						'integrasi_fact_perdabg.last_update'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new IntegrasiFactPerdabgTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new IntegrasiFactPerdabgTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        // dd($request->all());
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));

        $model = $this->model;

        $model->kd_struktur = $request->input('kd_struktur');
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->id_perda_bg = $request->input('id_perda_bg');
		$model->id_info_wilayah = $request->input('id_info_wilayah');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->uraian = $request->input('uraian');
		$model->klasifikasi_berdasarkan_sasaran_utama = $request->input('klasifikasi_berdasarkan_sasaran_utama');
		$model->status_perdabg = $request->input('status_perdabg');
		$model->keterangan = $request->input('keterangan');
		$model->tgl_input_perdabg = $request->input('tgl_input_perdabg');
		$model->tahun_perdabg = $request->input('tahun_perdabg');
		$model->no_perdabg = $request->input('no_perdabg');
		$model->luas_wilayah = $request->input('luas_wilayah');
		$model->angka_luas_wilayah = $request->input('angka_luas_wilayah');
		$model->satuan_luas_wilayah = $request->input('satuan_luas_wilayah');
		$model->isActive = $request->input('isActive');
		$model->perdabg_sk = $request->input('perdabg_sk');
		$model->last_update = $request->input('last_update');
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
        $model->id_perda_bg = $request->input('id_perda_bg');
		$model->id_info_wilayah = $request->input('id_info_wilayah');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->uraian = $request->input('uraian');
		$model->klasifikasi_berdasarkan_sasaran_utama = $request->input('klasifikasi_berdasarkan_sasaran_utama');
		$model->status_perdabg = $request->input('status_perdabg');
		$model->keterangan = $request->input('keterangan');
		$model->tgl_input_perdabg = $request->input('tgl_input_perdabg');
		$model->tahun_perdabg = $request->input('tahun_perdabg');
		$model->no_perdabg = $request->input('no_perdabg');
		$model->luas_wilayah = $request->input('luas_wilayah');
		$model->angka_luas_wilayah = $request->input('angka_luas_wilayah');
		$model->satuan_luas_wilayah = $request->input('satuan_luas_wilayah');
		$model->isActive = $request->input('isActive');
		$model->perdabg_sk = $request->input('perdabg_sk');
		$model->last_update = $request->input('last_update');
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