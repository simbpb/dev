<?php
namespace App\Models\Faq\FaqRthRencanaTigapuluhpersen;

use DB;
use File;

class FaqRthRencanaTigapuluhpersenRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-rth-rencana-tigapuluhpersen/file-dok-rencana-kota-hijau-rakh';

      
    public function __construct(
        FaqRthRencanaTigapuluhpersen $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_rth_rencana_tigapuluhpersen.id',
                        'faq_rth_rencana_tigapuluhpersen.rth_rencana_tigapuluhpersen_id',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_id',
						'faq_rth_rencana_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_rencana_tigapuluhpersen.thn_periode_keg',
						'faq_rth_rencana_tigapuluhpersen.lokasi_kode',
						'faq_rth_rencana_tigapuluhpersen.nama_propinsi',
						'faq_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_rencana_tigapuluhpersen.kd_struktur',
						'faq_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'faq_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'faq_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
						'faq_rth_rencana_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_rencana_tigapuluhpersen.last_update',
                        'faq_rth_rencana_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'faq_rth_rencana_tigapuluhpersen.rth_rencana_tigapuluhpersen_id',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_id',
						'faq_rth_rencana_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_rencana_tigapuluhpersen.thn_periode_keg',
						'faq_rth_rencana_tigapuluhpersen.lokasi_kode',
						'faq_rth_rencana_tigapuluhpersen.nama_propinsi',
						'faq_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_rencana_tigapuluhpersen.kd_struktur',
						'faq_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'faq_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'faq_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
						'faq_rth_rencana_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_rencana_tigapuluhpersen.last_update',
                        'faq_rth_rencana_tigapuluhpersen.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRthRencanaTigapuluhpersenTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('file_dok_rencana_kota_hijau_rakh')) {
			$image = $request->file('file_dok_rencana_kota_hijau_rakh');
			if (File::exists(public_path($model->file_dok_rencana_kota_hijau_rakh))) {
				File::delete(public_path($model->file_dok_rencana_kota_hijau_rakh));
			}
			$filename = str_slug($request->file_dok_rencana_kota_hijau_rakh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_dok_rencana_kota_hijau_rakh = $this->basePath1.'/'.$filename;
		}

        $model->rth_rencana_tigapuluhpersen_id = $request->input('rth_rencana_tigapuluhpersen_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->dok_rencana_kota_hijau_rakh = $request->input('dok_rencana_kota_hijau_rakh');
		$model->nama_dokumen_perencanaan = $request->input('nama_dokumen_perencanaan');
		$model->dok_disusun_tahun = $request->input('dok_disusun_tahun');
		$model->dok_disahkan_oleh = $request->input('dok_disahkan_oleh');
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
                        'faq_rth_rencana_tigapuluhpersen.id',
                        'faq_rth_rencana_tigapuluhpersen.rth_rencana_tigapuluhpersen_id',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_id',
						'faq_rth_rencana_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_rencana_tigapuluhpersen.thn_periode_keg',
						'faq_rth_rencana_tigapuluhpersen.lokasi_kode',
						'faq_rth_rencana_tigapuluhpersen.nama_propinsi',
						'faq_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_rencana_tigapuluhpersen.kd_struktur',
						'faq_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'faq_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'faq_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
						'faq_rth_rencana_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_rencana_tigapuluhpersen.last_update',
                        'faq_rth_rencana_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'faq_rth_rencana_tigapuluhpersen.rth_rencana_tigapuluhpersen_id',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_id',
						'faq_rth_rencana_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_rencana_tigapuluhpersen.thn_periode_keg',
						'faq_rth_rencana_tigapuluhpersen.lokasi_kode',
						'faq_rth_rencana_tigapuluhpersen.nama_propinsi',
						'faq_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_rencana_tigapuluhpersen.kd_struktur',
						'faq_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'faq_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'faq_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
						'faq_rth_rencana_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_rencana_tigapuluhpersen.last_update',
                        'faq_rth_rencana_tigapuluhpersen.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqRthRencanaTigapuluhpersenTransformer)->transformPaginate($model);
    }
}