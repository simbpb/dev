@extends('layouts.app')
@section('title', 'User PERDABG')
@section('breadcrumb')
	<li class="active">@yield('title')</li>
@endsection
@section('content')
<div class="page-header">
	<h1>@yield('title')</h1>
</div>
<div class="row">
   <div class="col-xs-12">
      <a href="/si-bpb/user-perdabg/create" class="btn btn-success btn-sm">
         <i class="fa fa-plus"></i> Tambah User</a>
   </div>
	<div class="col-xs-12">
		<table class="table table-bordered table-striped" id="data-table" style="width: 100%;"></table>
	</div>
</div>
@endsection
@section('js')
<script>
   var myTable = $('#data-table').DataTable({
      "processing": true,
      "serverSide": true,
      "language": {
         "search": "",
         "lengthMenu": '_MENU_ &nbsp;&nbsp;'
      },
      "ajax": function(data, callback, settings) {
         var column = data.columns[data.order[0].column].data;
         var dir = data.order[0].dir;
         $.getJSON(base_url + '/si-bpb/user-perdabg', {
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
      "columns": [
         { "title": "ID", "data": "id", "visible": false },
         { "title" : "Action", "orderable": false, "width": "100px", "className": "text-center", render: function (data, type, row, meta) {
            var edt = '<a href="'+base_url+'/si-bpb/user-perdabg/'+row.id+'/edit"><i class="ace-icon fa fa-pencil"></i></a>';
            var del = '<a href="'+base_url+'/si-bpb/user-perdabg/'+row.id+'/delete"><i class="ace-icon fa fa-trash"></i></a>';
            return edt+' '+del;
         }},
         { "title" : "No.", "data": null, "orderable": false, "width": "40px", render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
         }},
         { "title": "Nama", "data": "nama" },
         { "title": "NIP", "data": "nip" },
         { "title": "Username", "data": "username" },
         { "title": "Email", "data": "email" },
         { "title": "Role", "data": "role", render: function (data, type, row, meta) {
            var role = (row.role) ? row.role : '- not set -';
            var label = (row.role) ? 'primary' : 'danger';
            return '<span class="label label-'+label+'">'+ role +'</span>';
         }},
      ]
   });
</script>
@endsection