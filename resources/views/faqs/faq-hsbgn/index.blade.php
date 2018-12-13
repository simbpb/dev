@extends('layouts.app')
@section('title', 'Faq Hsbgn')
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
         { "title": "Hsbgn Id", "data": "hsbgn_id" },
			{ "title": "Info Wilayah Id", "data": "info_wilayah_id" },
			{ "title": "Detail Kdprog Id", "data": "detail_kdprog_id" },
			{ "title": "Thn Periode Keg", "data": "thn_periode_keg" },
			{ "title": "Lokasi Kode", "data": "lokasi_kode" },
			{ "title": "Tahun Penetapan", "data": "tahun_penetapan" },
			{ "title": "Nama Propinsi", "data": "nama_propinsi" },
			{ "title": "Nama Kabupatenkota", "data": "nama_kabupatenkota" },
			{ "title": "Nama Kecamatan", "data": "nama_kecamatan" },
			{ "title": "Kd Struktur", "data": "kd_struktur" },
			{ "title": "Angka Luas Wilayah", "data": "angka_luas_wilayah" },
			{ "title": "Satuan Luas Wilayah", "data": "satuan_luas_wilayah" },
			{ "title": "Zona", "data": "zona" },
			{ "title": "Bg Tidak Sederhana", "data": "bg_tidak_sederhana" },
			{ "title": "Bg Sederhana", "data": "bg_sederhana" },
			{ "title": "Rumahnegara Tipe A", "data": "rumahnegara_tipe_a" },
			{ "title": "Rumahnegara Tipe B", "data": "rumahnegara_tipe_b" },
			{ "title": "Rumahnegara Tipe C D E", "data": "rumahnegara_tipe_c_d_e" },
			{ "title": "Pagar Gedungnegara Depan", "data": "pagar_gedungnegara_depan" },
			{ "title": "Pagar Gedungnegara Samping", "data": "pagar_gedungnegara_samping" },
			{ "title": "Pagar Gedungnegara Belakang", "data": "pagar_gedungnegara_belakang" },
			{ "title": "Pagar Rumahnegara Depan", "data": "pagar_rumahnegara_depan" },
			{ "title": "Pagar Rumahnegara Samping", "data": "pagar_rumahnegara_samping" },
			{ "title": "Pagar Rumahnegara Belakang", "data": "pagar_rumahnegara_belakang" },
			{ "title": "Sk Penetapan", "data": "sk_penetapan" },
			{ "title": "Indeks Kemahalan Konstruksi", "data": "indeks_kemahalan_konstruksi" },
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