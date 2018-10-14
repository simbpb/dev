@extends('layouts.app')
@section('title', 'Bgh')
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
         { "title": "Nama Kegiatan", "data": "nama_kegiatan" },
{ "title": "Thn Anggaran", "data": "thn_anggaran" },
{ "title": "Sumber Anggaran", "data": "sumber_anggaran" },
{ "title": "Alokasi Anggaran", "data": "alokasi_anggaran" },
{ "title": "Volume Pekerjaan", "data": "volume_pekerjaan" },
{ "title": "Instansi Unit Organisasi Pelaksana", "data": "instansi_unit_organisasi_pelaksana" },
{ "title": "Lokasi Kegiatan Proyek", "data": "lokasi_kegiatan_proyek" },
{ "title": "Titik Koordinat", "data": "titik_koordinat" },
{ "title": "Status Aset", "data": "status_aset" },
{ "title": "Nama Kepala Dinas", "data": "nama_kepala_dinas" },
{ "title": "Nama Pengelola", "data": "nama_pengelola" },
{ "title": "Nama Penyedia Jasa Perencanaan", "data": "nama_penyedia_jasa_perencanaan" },
{ "title": "Thn Penerbitan Sertifikat Bgh", "data": "thn_penerbitan_sertifikat_bgh" },
{ "title": "No Sertifikat Bgh", "data": "no_sertifikat_bgh" },
{ "title": "No Plakat Bgh", "data": "no_plakat_bgh" },
{ "title": "Thn Penerbitan Sertifikat Pemanfaatan Bgh", "data": "thn_penerbitan_sertifikat_pemanfaatan_bgh" },
{ "title": "Peringkat Bgh", "data": "peringkat_bgh" },
{ "title": "Pemanfaatan Ke", "data": "pemanfaatan_ke" },
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