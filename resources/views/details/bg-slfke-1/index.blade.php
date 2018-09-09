@extends('layouts.app')
@section('title', 'Bg Slfke 1')
@section('js')
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datatables_extend.js') }}"></script>
<script type="text/javascript">
$(function() {
   $('#datatable').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": function(data, callback, settings) {
         var column = data.columns[data.order[0].column].data;
         var dir = data.order[0].dir;
         $.getJSON(base_url + '/details/{{$path}}', {
            limit: data.length,
            search: data.search.value,
            page: Math.ceil(data.start/data.length) + 1,
            field: column,
            order: dir
         }, function(res) {
            callback({
               recordsTotal: res.totalRow,
               recordsFiltered: res.totalRow,
               data: res.data
            });
         });
      },
      "columns": [
         { "title": "ID", "data": "id", "visible": false },
         { "title" : "No.", "data": null, "orderable": false, "width": "40px", render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
         }},
         { "title": "Kode Lokasi", "data": "lokasi_kode" },
         { "title": "Thn Periode Kegiatan", "data": "thn_periode_keg" },
         { "title": "Propinsi", "data": "nama_propinsi" },
         { "title": "Kabupaten/Kota", "data": "nama_kabupatenkota" },
         { "title": "No Perbub Perwal", "data": "no_perbub_perwal" },
{ "title": "Tgl Penetapan Perbub Perwal", "data": "tgl_penetapan_perbub_perwal" },
{ "title": "No Imb", "data": "no_imb" },
{ "title": "No Surat Krk", "data": "no_surat_krk" },
{ "title": "Nama Permohonan Slf Ke1", "data": "nama_permohonan_slf_ke1" },
{ "title": "Nama Pemilik Perorangan Bg Slf Ke1", "data": "nama_pemilik_perorangan_bg_slf_ke1" },
{ "title": "Id Pemilik Perorangan Bg Slf Ke1", "data": "id_pemilik_perorangan_bg_slf_ke1" },
{ "title": "Jenis Id Pemilik Perorangan Bg Slf Ke1", "data": "jenis_id_pemilik_perorangan_bg_slf_ke1" },
{ "title": "Nama Pemilik Badan Usaha Bg Slf Ke1", "data": "nama_pemilik_badan_usaha_bg_slf_ke1" },
{ "title": "No Akta Pendirian Badan Usaha Bg Slf Ke1", "data": "no_akta_pendirian_badan_usaha_bg_slf_ke1" },
{ "title": "Nama Institusi Slf Ke1", "data": "nama_institusi_slf_ke1" },
{ "title": "No Ikmn Pemerintah Slf Ke1", "data": "no_ikmn_pemerintah_slf_ke1" },
{ "title": "No Hdno Pemerintah Slf Ke1", "data": "no_hdno_pemerintah_slf_ke1" },
{ "title": "Propinsi Pemilik Bg Slf Ke1", "data": "propinsi_pemilik_bg_slf_ke1" },
{ "title": "Kabkota Pemilik Bg Slf Ke1", "data": "kabkota_pemilik_bg_slf_ke1" },
{ "title": "Kec Pemilik Bg Slf Ke1", "data": "kec_pemilik_bg_slf_ke1" },
{ "title": "Kel Pemilik Bg Slf Ke1", "data": "kel_pemilik_bg_slf_ke1" },
{ "title": "Rt Pemilik Bg Slf Ke1", "data": "rt_pemilik_bg_slf_ke1" },
{ "title": "Rw Pemilik Bg Slf Ke1", "data": "rw_pemilik_bg_slf_ke1" },
{ "title": "Alamat Pemilik Bg Slf Ke1", "data": "alamat_pemilik_bg_slf_ke1" },
{ "title": "Telp Pemilik Bg Slf Ke1", "data": "telp_pemilik_bg_slf_ke1" },
{ "title": "Email Pemilik Bg Slf Ke1", "data": "email_pemilik_bg_slf_ke1" },
{ "title": "Nama Pemilik Tanah", "data": "nama_pemilik_tanah" },
{ "title": "No Bukti Kepemilikan", "data": "no_bukti_kepemilikan" },
{ "title": "Jenis Bukti Kepemilikan", "data": "jenis_bukti_kepemilikan" },
{ "title": "Luas Tanah", "data": "luas_tanah" },
{ "title": "Satuan Luas Tanah", "data": "satuan_luas_tanah" },
{ "title": "Fungsi Bg", "data": "fungsi_bg" },
{ "title": "Jml Lantai Bg", "data": "jml_lantai_bg" },
{ "title": "Luas Bg", "data": "luas_bg" },
{ "title": "Satuan Luas Bg", "data": "satuan_luas_bg" },
{ "title": "Luas Lantai Basement", "data": "luas_lantai_basement" },
{ "title": "Satuan Lantai Basement", "data": "satuan_lantai_basement" },
{ "title": "Tgl Mulai Konstruksi", "data": "tgl_mulai_konstruksi" },
{ "title": "Tgl Selesai Konstruksi", "data": "tgl_selesai_konstruksi" },
{ "title": "Nilai Bg Sesuai Rab", "data": "nilai_bg_sesuai_rab" },
{ "title": "Lat Bg", "data": "lat_bg" },
{ "title": "Long Bg", "data": "long_bg" },
{ "title": "Tek Bg Rg Terbuka Hijau Pekarangan", "data": "tek_bg_rg_terbuka_hijau_pekarangan" },
{ "title": "Tek Bg Limbah B3", "data": "tek_bg_limbah_b3" },
{ "title": "Tek Bg Memiliki Perangkat Penangkal Kebakaran", "data": "tek_bg_memiliki_perangkat_penangkal_kebakaran" },
{ "title": "Tek Jenis Sanitasi", "data": "tek_jenis_sanitasi" },
{ "title": "Tek Bg Sumber Air", "data": "tek_bg_sumber_air" },
{ "title": "Penyedia Js Perencanaan Arsitektur", "data": "penyedia_js_perencanaan_arsitektur" },
{ "title": "No Serti Js Perencanaan Arsitektur", "data": "no_serti_js_perencanaan_arsitektur" },
{ "title": "Penyedia Js Pelaksana Arsitektur", "data": "penyedia_js_pelaksana_arsitektur" },
{ "title": "No Serti Js Pelaksana Arsitektur", "data": "no_serti_js_pelaksana_arsitektur" },
{ "title": "Penyedia Js Pengawas Arsitektur", "data": "penyedia_js_pengawas_arsitektur" },
{ "title": "No Serti Js Pengawas Arsitektur", "data": "no_serti_js_pengawas_arsitektur" },
{ "title": "Penyedia Js Perencanaan Struktur", "data": "penyedia_js_perencanaan_struktur" },
{ "title": "No Serti Js Perencanaan Struktur", "data": "no_serti_js_perencanaan_struktur" },
{ "title": "Penyedia Js Pelaksana Struktur", "data": "penyedia_js_pelaksana_struktur" },
{ "title": "No Serti Js Pelaksana Struktur", "data": "no_serti_js_pelaksana_struktur" },
{ "title": "Penyedia Js Pengawas Struktur", "data": "penyedia_js_pengawas_struktur" },
{ "title": "No Serti Js Pengawas Struktur", "data": "no_serti_js_pengawas_struktur" },
{ "title": "Penyedia Js Perencanaan Utilitas", "data": "penyedia_js_perencanaan_utilitas" },
{ "title": "No Serti Js Perencanaan Utilitas", "data": "no_serti_js_perencanaan_utilitas" },
{ "title": "Penyedia Js Pelaksana Utilitas", "data": "penyedia_js_pelaksana_utilitas" },
{ "title": "No Serti Js Pelaksana Utilitas", "data": "no_serti_js_pelaksana_utilitas" },
{ "title": "Penyedia Js Pengawas Utilitas", "data": "penyedia_js_pengawas_utilitas" },
{ "title": "No Serti Js Pengawas Utilitas", "data": "no_serti_js_pengawas_utilitas" },
{ "title": "Perpanjangan Slf Ke", "data": "perpanjangan_slf_ke" },
         { "title" : "", "orderable": false, "width": "170px", "className": "text-center", render: function (data, type, row, meta) {
            var view = '';
            var edit = '';
            var dele = '';
            @can('program_view')
               view = '<a href="{{ Navigation::adminUrl('/details/'.$path) }}/'+row.id+'/view" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="icon-eye"></i></a>';
            @endcan
            @can('program_edit')
               edit = '<a href="{{ Navigation::adminUrl('/details/'.$path) }}/'+row.id+'/edit" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="icon-pencil"></i></a>';
            @endcan
            @can('program_delete')
               dele = '<button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deleteRow(\'{{ Navigation::adminUrl('/details/'.$path) }}/'+row.id+'/delete\',\'{{ Navigation::adminUrl('/details/'.$path) }}\');"><i class="icon-eraser3"></i></button>';
            @endcan
            return view+' '+edit+' '+dele;
         }}
      ]
   });
});
</script>
@endsection
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title"><i class="icon-grid3 position-left"></i> @yield('title')</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
               @include('widgets.message')
               @can('program_create')
                  <a href="{{ Navigation::adminUrl('/details/'.$path) }}/create" class="btn btn-primary btn-xs">
                     <i class="icon-plus-circle2"></i> Tambah</a>
               @endcan
            </div>
            <table class="table" id="datatable"></table>
         </div>
      </div>
   </div>
</div>
@endsection