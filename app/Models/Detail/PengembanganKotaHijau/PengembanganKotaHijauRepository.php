<?php
namespace App\Models\Detail\PengembanganKotaHijau;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class PengembanganKotaHijauRepository
{

    protected $model;
    protected $program;
    
      
    public function __construct(
        PengembanganKotaHijau $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_pengembangan_kota_hijau.id',
                        'tbl_detail_pengembangan_kota_hijau.thn_periode_keg',
                        'tbl_detail_pengembangan_kota_hijau.lokasi_kode',
                        'tbl_detail_pengembangan_kota_hijau.nama_propinsi',
                        'tbl_detail_pengembangan_kota_hijau.nama_kabupatenkota',
                        'tbl_detail_pengembangan_kota_hijau.thn_anggaran',
						'tbl_detail_pengembangan_kota_hijau.nama_kegiatan',
						'tbl_detail_pengembangan_kota_hijau.attribute_kota_hijau',
						'tbl_detail_pengembangan_kota_hijau.thn_penetapan',
						'tbl_detail_pengembangan_kota_hijau.sumber_anggaran',
						'tbl_detail_pengembangan_kota_hijau.alokasi_anggaran',
						'tbl_detail_pengembangan_kota_hijau.volume_pekerjaan',
						'tbl_detail_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'tbl_detail_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'tbl_detail_pengembangan_kota_hijau.titik_koordinat_lat',
						'tbl_detail_pengembangan_kota_hijau.titik_koordinat_long',
						'tbl_detail_pengembangan_kota_hijau.status_aset',
						'tbl_detail_pengembangan_kota_hijau.nama_lokasi',
						'tbl_detail_pengembangan_kota_hijau.luas_kws',
						'tbl_detail_pengembangan_kota_hijau.satuan_luas_kws',
						'tbl_detail_pengembangan_kota_hijau.cakupan_wilayah',
						'tbl_detail_pengembangan_kota_hijau.uraian_singkat_karakter_lokasi',
                        'tbl_detail_pengembangan_kota_hijau.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_pengembangan_kota_hijau.thn_periode_keg',
                        'tbl_detail_pengembangan_kota_hijau.lokasi_kode',
                        'tbl_detail_pengembangan_kota_hijau.nama_propinsi',
                        'tbl_detail_pengembangan_kota_hijau.nama_kabupatenkota',
                        'tbl_detail_pengembangan_kota_hijau.thn_anggaran',
						'tbl_detail_pengembangan_kota_hijau.nama_kegiatan',
						'tbl_detail_pengembangan_kota_hijau.attribute_kota_hijau',
						'tbl_detail_pengembangan_kota_hijau.thn_penetapan',
						'tbl_detail_pengembangan_kota_hijau.sumber_anggaran',
						'tbl_detail_pengembangan_kota_hijau.alokasi_anggaran',
						'tbl_detail_pengembangan_kota_hijau.volume_pekerjaan',
						'tbl_detail_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'tbl_detail_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'tbl_detail_pengembangan_kota_hijau.titik_koordinat_lat',
						'tbl_detail_pengembangan_kota_hijau.titik_koordinat_long',
						'tbl_detail_pengembangan_kota_hijau.status_aset',
						'tbl_detail_pengembangan_kota_hijau.nama_lokasi',
						'tbl_detail_pengembangan_kota_hijau.luas_kws',
						'tbl_detail_pengembangan_kota_hijau.satuan_luas_kws',
						'tbl_detail_pengembangan_kota_hijau.cakupan_wilayah',
						'tbl_detail_pengembangan_kota_hijau.uraian_singkat_karakter_lokasi',
                        'tbl_detail_pengembangan_kota_hijau.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new PengembanganKotaHijauTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new PengembanganKotaHijauTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        

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
        $model->thn_anggaran = $request->input('thn_anggaran');
$model->nama_kegiatan = $request->input('nama_kegiatan');
$model->attribute_kota_hijau = $request->input('attribute_kota_hijau');
$model->thn_penetapan = $request->input('thn_penetapan');
$model->sumber_anggaran = $request->input('sumber_anggaran');
$model->alokasi_anggaran = $request->input('alokasi_anggaran');
$model->volume_pekerjaan = $request->input('volume_pekerjaan');
$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
$model->titik_koordinat_long = $request->input('titik_koordinat_long');
$model->status_aset = $request->input('status_aset');
$model->nama_lokasi = $request->input('nama_lokasi');
$model->luas_kws = $request->input('luas_kws');
$model->satuan_luas_kws = $request->input('satuan_luas_kws');
$model->cakupan_wilayah = $request->input('cakupan_wilayah');
$model->uraian_singkat_karakter_lokasi = $request->input('uraian_singkat_karakter_lokasi');
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
        $model->thn_anggaran = $request->input('thn_anggaran');
$model->nama_kegiatan = $request->input('nama_kegiatan');
$model->attribute_kota_hijau = $request->input('attribute_kota_hijau');
$model->thn_penetapan = $request->input('thn_penetapan');
$model->sumber_anggaran = $request->input('sumber_anggaran');
$model->alokasi_anggaran = $request->input('alokasi_anggaran');
$model->volume_pekerjaan = $request->input('volume_pekerjaan');
$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
$model->titik_koordinat_long = $request->input('titik_koordinat_long');
$model->status_aset = $request->input('status_aset');
$model->nama_lokasi = $request->input('nama_lokasi');
$model->luas_kws = $request->input('luas_kws');
$model->satuan_luas_kws = $request->input('satuan_luas_kws');
$model->cakupan_wilayah = $request->input('cakupan_wilayah');
$model->uraian_singkat_karakter_lokasi = $request->input('uraian_singkat_karakter_lokasi');
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