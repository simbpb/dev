@extends('layouts.app')
@section('title', 'Informasi Wilayah')
@section('breadcrumb')
	<li class="active">@yield('title')</li>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.4/css/fixedColumns.bootstrap.min.css" />
@endsection
@section('content')
<div class="page-header">
	<h1>@yield('title')</h1>
</div>
<div class="row">
   <div class="col-xs-12">
      <a href="/si-bpb/informasi-wilayah/create" class="btn btn-success btn-sm">
         <i class="fa fa-plus"></i> Tambah Data</a>
   </div>
	<div class="col-xs-12">
		<table class="table table-bordered table-striped nowrap" id="data-table" style="width: 100%;"></table>
	</div>
</div>
@endsection
@section('js')
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script>
   var myTable = $('#data-table').DataTable({
      initComplete: function(){
         var api = this.api();
         new $.fn.dataTable.Buttons(api, {
            buttons: [
               'copyHtml5', 'excelHtml5', 'pdfHtml5'
            ]
         });
         api.buttons().container().appendTo( '#' + api.table().container().id + ' .col-sm-6:eq(0) .dataTables_length' );  
      },
      "processing": true,
      "serverSide": true,
      "language": {
         "search": "",
         "lengthMenu": '_MENU_ &nbsp;&nbsp;'
      },
      scrollX: true,
      fixedColumns: true,
      "ajax": function(data, callback, settings) {
         var column = data.columns[data.order[0].column].data;
         var dir = data.order[0].dir;
         $.getJSON(base_url + '/si-bpb/informasi-wilayah', {
            limit: data.length,
            search: data.search.value,
            page: Math.ceil(data.start/data.length) + 1,
            column: column,
            order: dir
         }, function(res) {
            callback({
               recordsTotal: res.totalRow,
               recordsFiltered: res.totalRow,
               data: res.data
            });
         });
      },
      scrollX: true,
      fixedColumns: {
         leftColumns: 3,
      },
      "columns": [
         { "title": "ID", "data": "id", "visible": false },
         { "title" : "Action", "width": "80px", "orderable": false, "className": "text-center", render: function (data, type, row, meta) {
            var edt = '<a href="'+base_url+'/informasi-wilayah/'+row.id+'/edit"><i class="ace-icon fa fa-pencil"></i></a>';
            var del = '<a href="'+base_url+'/informasi-wilayah/'+row.id+'/delete"><i class="ace-icon fa fa-trash"></i></a>';
            return edt+' '+del;
         }},
         { "title" : "No.", "data": null, "orderable": false, "width": "40px", render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
         }},
         { "title": "Provinsi", "data": "provinsi" },
         { "title": "Kabupaten Kota", "data": "kabupatenkota" },
         { "title": "Luas Wilayah (Km)", "data": "luas_wilayah_km" },
      ]
   });
</script>
@endsection