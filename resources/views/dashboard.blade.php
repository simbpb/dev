@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<!-- Page header -->
<!-- <div class="page-header">
   <div class="page-header-content">
      <div class="page-title">
         <h4><i class="icon-display4 position-left"></i> <span class="text-semibold">Dashboard</span></h4>
         <ul class="breadcrumb breadcrumb-caret position-right">
            <li><a href="/">Home</a></li>
            <li class="active">Dashboard</li>
         </ul>
      </div>
   </div>
</div> -->
  <!-- /page header -->
  <!-- Page container -->
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title"><i class="icon-display4 position-left"></i> Dashboard</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
               <table class="table table-striped table-bordered">
                  <thead>
                     <tr>
                        <th colspan="2">2015</th>
                        <th colspan="2">2016</th>
                        <th colspan="2">2017</th>
                        <th colspan="2">2018</th>
                        <th colspan="2">2019</th>
                        <th colspan="2">Total</th>
                        <th rowspan="2">Satuan</th>
                     </tr>
                     <tr>
                        <th>Target</th>
                        <th>Aktual</th>
                        <th>Target</th>
                        <th>Aktual</th>
                        <th>Target</th>
                        <th>Aktual</th>
                        <th>Target</th>
                        <th>Aktual</th>
                        <th>Target</th>
                        <th>Aktual</th>
                        <th>Target</th>
                        <th>Aktual</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($model as $row)
                     <tr>
                        <td colspan="13">{{ $row->nama_kegiatan_renstra }}</td>
                     </tr>
                     <tr>
                        <td>{{ $row->target_2015 }}</td>
                        <td>{{ $row->capaian_2015 }}</td>
                        <td>{{ $row->target_2016 }}</td>
                        <td>{{ $row->capaian_2016 }}</td>
                        <td>{{ $row->target_2017 }}</td>
                        <td>{{ $row->capaian_2017 }}</td>
                        <td>{{ $row->target_2018 }}</td>
                        <td>{{ $row->capaian_2018 }}</td>
                        <td>{{ $row->target_2019 }}</td>
                        <td>{{ $row->capaian_2019 }}</td>
                        <td>{{ $row->total_target }}</td>
                        <td>{{ $row->total_capaian }}</td>
                        <td>{{ $row->satuan }}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
      
