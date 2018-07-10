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
            <h6 class="text-semibold">Start your development with no hassle!</h6>
            <p class="content-group">Common problem of templates is that all code is deeply integrated into the core. This limits your freedom in decreasing amount of code, i.e. it becomes pretty difficult to remove unnecessary code from the project. Limitless allows you to remove unnecessary and extra code easily just by removing the path to specific LESS file with component styling. All plugins and their options are also in separate files. Use only components you actually need!</p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
      
