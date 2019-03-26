<?php
namespace App\Models\Faq\FaqAssetCagarBudaya;

use DB;
use File;

class FaqAssetCagarBudayaRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-asset-cagar-budaya/file-sk-penetapan-cagar-budaya';

      
    public function __construct(
        FaqAssetCagarBudaya $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_asset_cagar_budaya.id',
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    )->searchOrder($request, [
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqAssetCagarBudayaTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('file_sk_penetapan_cagar_budaya')) {
			$image = $request->file('file_sk_penetapan_cagar_budaya');
			if (File::exists(public_path($model->file_sk_penetapan_cagar_budaya))) {
				File::delete(public_path($model->file_sk_penetapan_cagar_budaya));
			}
			$filename = str_slug($request->file_sk_penetapan_cagar_budaya).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_penetapan_cagar_budaya = $this->basePath1.'/'.$filename;
		}

        $model->cagar_budaya_id = $request->input('cagar_budaya_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->nama_aset_cagar_budaya = $request->input('nama_aset_cagar_budaya');
		$model->klasifikasi_cagar_budaya = $request->input('klasifikasi_cagar_budaya');
		$model->nama_instansi_cagar_budaya = $request->input('nama_instansi_cagar_budaya');
		$model->lokasi_cagar_budaya = $request->input('lokasi_cagar_budaya');
		$model->sk_penetapan = $request->input('sk_penetapan');
		$model->tahun_penetapan = $request->input('tahun_penetapan');
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
                        'faq_asset_cagar_budaya.id',
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    )->searchOrder($request, [
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqAssetCagarBudayaTransformer)->transformPaginate($model);
    }
}