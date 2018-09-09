@extends('layouts.app')
@section('title', 'Hsbgn')
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
         { "title": "Thn Penetapan", "data": "thn_penetapan" },
{ "title": "Nama Kecamatan", "data": "nama_kecamatan" },
{ "title": "Zona", "data": "zona" },
{ "title": "Bg Tidak Sederhana", "data": "bg_tidak_sederhana" },
{ "title": "Bg Sederhana", "data": "bg_sederhana" },
{ "title": "Rn Tipe A", "data": "rn_tipe_a" },
{ "title": "Rn Tipe B", "data": "rn_tipe_b" },
{ "title": "Rn Tipe C D E", "data": "rn_tipe_c_d_e" },
{ "title": "Pagar Gedungnegara Dpn", "data": "pagar_gedungnegara_dpn" },
{ "title": "Pagar Gedungnegara Samping", "data": "pagar_gedungnegara_samping" },
{ "title": "Pagar Gedungnegara Blkg", "data": "pagar_gedungnegara_blkg" },
{ "title": "Pagar Rn Dpn", "data": "pagar_rn_dpn" },
{ "title": "Pagar Rn Samping", "data": "pagar_rn_samping" },
{ "title": "Pagar Rn Blkg", "data": "pagar_rn_blkg" },
{ "title": "Harga Satuan", "data": "harga_satuan" },
{ "title": "Sk Penetapan", "data": "sk_penetapan" },
{ "title": "Indeks Kemahalan Konstruksi", "data": "indeks_kemahalan_konstruksi" },
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