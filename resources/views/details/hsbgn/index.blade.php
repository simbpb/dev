@extends('layouts.app')
@section('title', 'STANDAR HARGA SATUAN BANGUNAN GEDUNG NEGARA (HSBGN)')
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
         }},
         { "title": "ID", "data": "id", "visible": false },
         { "title" : "No.", "data": null, "orderable": false, "width": "40px", render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
         }},
         { "title": "Thn Periode Kegiatan", "data": "thn_periode_keg" },
         { "title": "Propinsi", "data": "nama_propinsi" },
         { "title": "Kabupaten/Kota", "data": "nama_kabupatenkota" },
         { "title": "Tahun Penetapan", "data": "tahun_penetapan" },
			{ "title": "Nama Kecamatan", "data": "nama_kecamatan" },
			{ "title": "Angka Luas Wilayah", "data": "angka_luas_wilayah" },
			{ "title": "Satuan Luas Wilayah", "data": "satuan_luas_wilayah" },
			{ "title": "Zona", "data": "zona" },
			{ "title": "Bangunan Gedung Tidak Sederhana", "data": "bg_tidak_sederhana" },
			{ "title": "Bangunan Gedung Sederhana", "data": "bg_sederhana" },
			{ "title": "Rumah Negara Tipe A", "data": "rumahnegara_tipe_a" },
			{ "title": "Rumah Negara Tipe B", "data": "rumahnegara_tipe_b" },
			{ "title": "Rumah Negara Tipe C, D dan E", "data": "rumahnegara_tipe_c_d_e" },
			{ "title": "Pagar Gedung Negara Depan", "data": "pagar_gedungnegara_depan" },
			{ "title": "Pagar Gedung Negara Samping", "data": "pagar_gedungnegara_samping" },
			{ "title": "Pagar Gedung Negara Belakang", "data": "pagar_gedungnegara_belakang" },
			{ "title": "Pagar Rumah Negara Depan", "data": "pagar_rumahnegara_depan" },
			{ "title": "Pagar Rumah Negara Samping", "data": "pagar_rumahnegara_samping" },
			{ "title": "Pagar Rumah Negara Belakang", "data": "pagar_rumahnegara_belakang" },
			{ "title": "SK Penetapan", "data": "sk_penetapan" },
			{ "title": "Indeks Kemahalan Konstruksi (IKK)", "data": "indeks_kemahalan_konstruksi" },
         { "title" : "Status", "data": "is_actived", "width": "40px", render: function (data, type, row, meta) {
            var label = (row.is_actived == 'ACTIVE') ? 'primary' : 'warning';
            return (row.is_actived) ? '<label class="label label-'+label+'">'+row.is_actived+'<label>' : '';
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
