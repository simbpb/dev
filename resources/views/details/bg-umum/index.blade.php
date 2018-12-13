@extends('layouts.app')
@section('title', 'Bg Umum')
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
         { "title": "Thn Periode Kegiatan", "data": "thn_periode_keg" },
         { "title": "Propinsi", "data": "nama_propinsi" },
         { "title": "Kabupaten/Kota", "data": "nama_kabupatenkota" },
         { "title": "Nama Kecamatan", "data": "nama_kecamatan" },
			{ "title": "Nama Kelurahan", "data": "nama_kelurahan" },
			{ "title": "Rt", "data": "rt" },
			{ "title": "Rw", "data": "rw" },
			{ "title": "No Rumah", "data": "no_rumah" },
			{ "title": "Nama Pemilik Bangunan", "data": "nama_pemilik_bangunan" },
			{ "title": "No Ktp Pemilik Bangunan", "data": "no_ktp_pemilik_bangunan" },
			{ "title": "Alamat Bangunan", "data": "alamat_bangunan" },
			{ "title": "Fungsi Bangunan", "data": "fungsi_bangunan" },
			{ "title": "Memiliki Imb", "data": "memiliki_imb" },
			{ "title": "No Imb", "data": "no_imb" },
			{ "title": "Memiliki Slf", "data": "memiliki_slf" },
			{ "title": "No Slf", "data": "no_slf" },
			{ "title": "Tingkat Kompleksitas", "data": "tingkat_kompleksitas" },
			{ "title": "Tingkat Permanensi", "data": "tingkat_permanensi" },
			{ "title": "Tingkat Risiko Kebakaran", "data": "tingkat_risiko_kebakaran" },
			{ "title": "Zona Gempa", "data": "zona_gempa" },
			{ "title": "Kategori Lokasi", "data": "kategori_lokasi" },
			{ "title": "Kategori Ketinggian", "data": "kategori_ketinggian" },
			{ "title": "Kepemilikan", "data": "kepemilikan" },
			{ "title": "Titik Koordinat Lat", "data": "titik_koordinat_lat" },
			{ "title": "Titik Koordinat Long", "data": "titik_koordinat_long" },
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
               dele = '<button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deleteRow(\'{{ Navigation::adminUrl('/details/'.$path) }}/'+row.id+'/delete\',\'{{ Navigation::adminUrl('/details/'.$path.'/'.$programId) }}\');"><i class="icon-eraser3"></i></button>';
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