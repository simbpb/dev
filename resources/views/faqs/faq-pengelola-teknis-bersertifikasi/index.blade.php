@extends('layouts.app')
@section('title', 'Faq Pengelola Teknis Bersertifikasi')
@section('js')
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datatables_extend.js') }}"></script>
<script type="text/javascript">
$(function() {
   $('#datatable').DataTable({
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "scrollCollapse": true,
      "buttons": {            
         dom: {
             button: {
                 className: 'btn btn-default'
             }
         },
         buttons: [
             'copyHtml5',
             'excelHtml5',
             'csvHtml5',
             'pdfHtml5'
         ]
      },
      "ajax": function(data, callback, settings) {
         var column = data.columns[data.order[0].column].data;
         var dir = data.order[0].dir;
         $.getJSON(base_url + '/faqs/{{$path}}', {
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
         { "title": "Pengelola Teknis Bersertifikasi Id", "data": "pengelola_teknis_bersertifikasi_id" },
			{ "title": "Info Wilayah Id", "data": "info_wilayah_id" },
			{ "title": "Detail Kdprog Id", "data": "detail_kdprog_id" },
			{ "title": "Thn Periode Keg", "data": "thn_periode_keg" },
			{ "title": "Lokasi Kode", "data": "lokasi_kode" },
			{ "title": "Nama Propinsi", "data": "nama_propinsi" },
			{ "title": "Nama Kabupatenkota", "data": "nama_kabupatenkota" },
			{ "title": "Kd Struktur", "data": "kd_struktur" },
			{ "title": "No Sertifikat Pengelola Teknis", "data": "no_sertifikat_pengelola_teknis" },
			{ "title": "Tgl Sertifikat Pengelola Teknis", "data": "tgl_sertifikat_pengelola_teknis" },
			{ "title": "Nama Pejabat", "data": "nama_pejabat" },
			{ "title": "Jabatan", "data": "jabatan" },
			{ "title": "Nama Pengelola Teknis", "data": "nama_pengelola_teknis" },
			{ "title": "No Ktp Pengelola Teknis", "data": "no_ktp_pengelola_teknis" },
			{ "title": "Dinas Instansi Asal Unit Org", "data": "dinas_instansi_asal_unit_org" },
			{ "title": "Alamat Pengelola Teknis", "data": "alamat_pengelola_teknis" },
			{ "title": "Pendidikan Terakhir Pengelola Teknis", "data": "pendidikan_terakhir_pengelola_teknis" },
			{ "title": "Jurusan Pendidikan Terakhir", "data": "jurusan_pendidikan_terakhir" },
			{ "title": "Asal Universitas", "data": "asal_universitas" },
			{ "title": "Tgl Input Wilayah", "data": "tgl_input_wilayah" },
			{ "title": "Info Wilayah Sk", "data": "info_wilayah_sk" },
			{ "title": "Last Update", "data": "last_update" },
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
            </div>
            <table class="table" id="datatable"></table>
         </div>
      </div>
   </div>
</div>
@endsection