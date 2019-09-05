@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title"><i class="icon-display4 position-left"></i> Dashboard DataMart</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
               @foreach ($rows as $key => $row)
               <div class="col-md-4">
                  <div class="panel panel-flat border-top-xlg border-top-warning">
                     <div class="panel-heading">
                        <a href="/panel/faqs/{{ $key }}" target="_blank">{{ strtoupper($row) }}</a>
                     </div>
                     <div class="panel-body"></div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
      
