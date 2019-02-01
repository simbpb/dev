@extends('layouts.modal')
@section('title', 'Bg Umum')
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
         $.getJSON(base_url + '/faqs-modal/{{$path}}/{{$lokasiKode}}?act=ajax', {
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
         { "title": "Bg Umum Id", "data": "bg_umum_id" },
			{ "title": "Info Wilayah Id", "data": "info_wilayah_id" },
			{ "title": "Detail Kdprog Id", "data": "detail_kdprog_id" },
			{ "title": "Thn Periode Keg", "data": "thn_periode_keg" },
			{ "title": "Lokasi Kode", "data": "lokasi_kode" },
			{ "title": "Nama Propinsi", "data": "nama_propinsi" },
			{ "title": "Nama Kabupatenkota", "data": "nama_kabupatenkota" },
			{ "title": "Nama Kecamatan", "data": "nama_kecamatan" },
			{ "title": "Nama Kelurahan", "data": "nama_kelurahan" },
			{ "title": "Kd Struktur", "data": "kd_struktur" },
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