@extends('layouts.app')
@section('title', 'Info Kewilayahan')
@section('js')
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datatables_extend.js') }}"></script>
<script type="text/javascript">
$(function() {
   $('#datatable').DataTable({
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "scrollCollapse": true,
      "ajax": function(data, callback, settings) {
         var column = data.columns[data.order[0].column].data;
         var dir = data.order[0].dir;
         $.getJSON(base_url + '/details/{{$path}}/{{$programId}}', {
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
         { "title": "Klasifikasi Berdasarkan Sasaran Utama", "data": "klasifikasi_berdasarkan_sasaran_utama" },
{ "title": "Luas Wilayah Km", "data": "luas_wilayah_km" },
{ "title": "A41 1 Pengembangan Peningkatan Fungsi", "data": "a41_1_pengembangan_peningkatan_fungsi" },
{ "title": "A41 2 Pengembangan Baru", "data": "a41_2_pengembangan_baru" },
{ "title": "A41 3 Revitalisasi Kota Yg Telah Berfungsi", "data": "a41_3_revitalisasi_kota_yg_telah_berfungsi" },
{ "title": "A42 Mendorong Pengembangan Kota Sentra Produksi", "data": "a42_mendorong_pengembangan_kota_sentra_produksi" },
{ "title": "A43 1 Pengembangan Peningkatan Fungsi", "data": "a43_1_pengembangan_peningkatan_fungsi" },
{ "title": "A43 2 Pengembangan Baru", "data": "a43_2_pengembangan_baru" },
{ "title": "A43 3 Revitalisasi Kota Yg Telah Berfungsi", "data": "a43_3_revitalisasi_kota_yg_telah_berfungsi" },
{ "title": "A44 1 Rehabilitasi Kota Akibat Bencana Alam", "data": "a44_1_rehabilitasi_kota_akibat_bencana_alam" },
{ "title": "A44 2 Pengendalian Mitigasi Bencana", "data": "a44_2_pengendalian_mitigasi_bencana" },
{ "title": "A51 Lima Kws Metropolitan Br", "data": "a51_lima_kws_metropolitan_br" },
{ "title": "A52 Tujuh Kws Perkotaan Metropolitan", "data": "a52_tujuh_kws_perkotaan_metropolitan" },
{ "title": "A53 Duapuluh Kota Otonom", "data": "a53_duapuluh_kota_otonom" },
{ "title": "A54 Sepuluh Kota Baru Publik", "data": "a54_sepuluh_kota_baru_publik" },
{ "title": "A61 Nama Kspn", "data": "a61_nama_kspn" },
{ "title": "A62 Nama Kspn", "data": "a62_nama_kspn" },
{ "title": "A63 Nama Kspn", "data": "a63_nama_kspn" },
{ "title": "A64 Nama Kspn", "data": "a64_nama_kspn" },
{ "title": "A65 Nama Kspn", "data": "a65_nama_kspn" },
{ "title": "A66 Nama Kspn", "data": "a66_nama_kspn" },
{ "title": "A67 Nama Kspn", "data": "a67_nama_kspn" },
{ "title": "A68 Nama Kspn", "data": "a68_nama_kspn" },
{ "title": "A69 Nama Kspn", "data": "a69_nama_kspn" },
{ "title": "A70 Nama Kspn", "data": "a70_nama_kspn" },
{ "title": "A71 Nama Kspn", "data": "a71_nama_kspn" },
{ "title": "A72 Nama Kspn", "data": "a72_nama_kspn" },
{ "title": "A71 Indeks Resiko Bencana", "data": "a71_indeks_resiko_bencana" },
{ "title": "A72 1 Resiko Tinggi", "data": "a72_1_resiko_tinggi" },
{ "title": "A72 2 Resiko Sedang", "data": "a72_2_resiko_sedang" },
{ "title": "A72 3 Resiko Rendah", "data": "a72_3_resiko_rendah" },
{ "title": "A73 1 Banjir", "data": "a73_1_banjir" },
{ "title": "A73 2 Gempa Bumi", "data": "a73_2_gempa_bumi" },
{ "title": "A73 3 Kebakaran", "data": "a73_3_kebakaran" },
{ "title": "A73 4 Tanah Longsor", "data": "a73_4_tanah_longsor" },
{ "title": "A73 5 Tsunami", "data": "a73_5_tsunami" },
{ "title": "A73 6 Banjir Bandang", "data": "a73_6_banjir_bandang" },
{ "title": "A73 7 Kekeringan", "data": "a73_7_kekeringan" },
{ "title": "Jml Penduduk Kota 2014", "data": "jml_penduduk_kota_2014" },
{ "title": "Jml Penduduk Kota 2015", "data": "jml_penduduk_kota_2015" },
{ "title": "Jml Penduduk Kota 2016", "data": "jml_penduduk_kota_2016" },
{ "title": "Jml Penduduk Kota 2017", "data": "jml_penduduk_kota_2017" },
{ "title": "Jml Penduduk Kota 2018", "data": "jml_penduduk_kota_2018" },
{ "title": "Jml Penduduk Desa 2014", "data": "jml_penduduk_desa_2014" },
{ "title": "Jml Penduduk Desa 2015", "data": "jml_penduduk_desa_2015" },
{ "title": "Jml Penduduk Desa 2016", "data": "jml_penduduk_desa_2016" },
{ "title": "Jml Penduduk Desa 2017", "data": "jml_penduduk_desa_2017" },
{ "title": "Jml Penduduk Desa 2018", "data": "jml_penduduk_desa_2018" },
         { "title" : "Status", "data": "is_actived", "width": "40px", render: function (data, type, row, meta) {
            var label = (row.is_actived == 'ACTIVE') ? 'primary' : 'warning';
            return (row.is_actived) ? '<label class="label label-'+label+'">'+row.is_actived+'<label>' : '';
         }},
         { "title" : "", "orderable": false, "width": "170px", "className": "text-center", render: function (data, type, row, meta) {
            var view = '';
            var edit = '';
            var dele = '';
            @can('program_view')
               view = '<a href="{{ Navigation::adminUrl('/details/'.$path.'/'.$programId) }}/'+row.id+'/view" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="icon-eye"></i></a>';
            @endcan
            @can('program_edit')
               edit = '<a href="{{ Navigation::adminUrl('/details/'.$path.'/'.$programId) }}/'+row.id+'/edit" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="icon-pencil"></i></a>';
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
                  <a href="{{ Navigation::adminUrl('/details/'.$path.'/'.$programId) }}/create" class="btn btn-primary btn-xs">
                     <i class="icon-plus-circle2"></i> Tambah</a>
               @endcan
            </div>
            <table class="table" id="datatable"></table>
         </div>
      </div>
   </div>
</div>
@endsection