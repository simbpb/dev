<?php
namespace App\Models\Detail\PenataanBgKwsRawanBencana;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class PenataanBgKwsRawanBencanaRepository
{

    protected $model;
    protected $program;
    
      
    public function __construct(
        PenataanBgKwsRawanBencana $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_penataan_bg_kws_rawan_bencana.id',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.thn_periode_keg',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.lokasi_kode',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.nama_propinsi',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.nama_kabupatenkota',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.indeks_resiko',
						'tbl_detail_penataan_bg_kws_rawan_bencana.tingkat_resiko',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Risiko_Bencana_Dominan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.struktur_ruang',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Nama_Kegiatan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Tahun_Anggaran',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Sumber_Pendanaan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Alokasi_Anggaran',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Volume_Pekerjaan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Instansi_Unit',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Lokasi_Kegiatan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Titik_koordinat_lat',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Titik_koordinat_log',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Status_Aset',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_penataan_bg_kws_rawan_bencana.thn_periode_keg',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.lokasi_kode',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.nama_propinsi',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.nama_kabupatenkota',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.indeks_resiko',
						'tbl_detail_penataan_bg_kws_rawan_bencana.tingkat_resiko',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Risiko_Bencana_Dominan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.struktur_ruang',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Nama_Kegiatan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Tahun_Anggaran',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Sumber_Pendanaan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Alokasi_Anggaran',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Volume_Pekerjaan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Instansi_Unit',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Lokasi_Kegiatan',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Titik_koordinat_lat',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Titik_koordinat_log',
						'tbl_detail_penataan_bg_kws_rawan_bencana.Status_Aset',
                        'tbl_detail_penataan_bg_kws_rawan_bencana.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new PenataanBgKwsRawanBencanaTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new PenataanBgKwsRawanBencanaTransformer)->transformDetail($model);
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
        $model->indeks_resiko = $request->input('indeks_resiko');
$model->tingkat_resiko = $request->input('tingkat_resiko');
$model->Risiko_Bencana_Dominan = $request->input('Risiko_Bencana_Dominan');
$model->struktur_ruang = $request->input('struktur_ruang');
$model->Nama_Kegiatan = $request->input('Nama_Kegiatan');
$model->Tahun_Anggaran = $request->input('Tahun_Anggaran');
$model->Sumber_Pendanaan = $request->input('Sumber_Pendanaan');
$model->Alokasi_Anggaran = $request->input('Alokasi_Anggaran');
$model->Volume_Pekerjaan = $request->input('Volume_Pekerjaan');
$model->Instansi_Unit = $request->input('Instansi_Unit');
$model->Lokasi_Kegiatan = $request->input('Lokasi_Kegiatan');
$model->Titik_koordinat_lat = $request->input('Titik_koordinat_lat');
$model->Titik_koordinat_log = $request->input('Titik_koordinat_log');
$model->Status_Aset = $request->input('Status_Aset');
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
        $model->indeks_resiko = $request->input('indeks_resiko');
$model->tingkat_resiko = $request->input('tingkat_resiko');
$model->Risiko_Bencana_Dominan = $request->input('Risiko_Bencana_Dominan');
$model->struktur_ruang = $request->input('struktur_ruang');
$model->Nama_Kegiatan = $request->input('Nama_Kegiatan');
$model->Tahun_Anggaran = $request->input('Tahun_Anggaran');
$model->Sumber_Pendanaan = $request->input('Sumber_Pendanaan');
$model->Alokasi_Anggaran = $request->input('Alokasi_Anggaran');
$model->Volume_Pekerjaan = $request->input('Volume_Pekerjaan');
$model->Instansi_Unit = $request->input('Instansi_Unit');
$model->Lokasi_Kegiatan = $request->input('Lokasi_Kegiatan');
$model->Titik_koordinat_lat = $request->input('Titik_koordinat_lat');
$model->Titik_koordinat_log = $request->input('Titik_koordinat_log');
$model->Status_Aset = $request->input('Status_Aset');
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