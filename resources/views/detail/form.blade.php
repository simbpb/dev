@extends('layouts.app')
@section('title', 'Daftar Detail Program')
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-key position-left"></i> 
	               	<a href="{{ Navigation::adminUrl('/detail') }}">@yield('title')</a>
	               	<i class="icon-forward3"></i> {!! (isset($model)) ? 'Ubah' : 'Tambah' !!} @yield('title')
	           </h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
            	@include('widgets.error')
            	@if(isset($model))
				    {{ Form::model($model, ['id' => 'model-form','class'=>'form-horizontal']) }}
				@else
				    {{ Form::open(['id' => 'model-form','class'=>'form-horizontal']) }}
				@endif
				<div class="row"> 
					<div class="col-lg-6">
						<div class="form-group">
				    		<label class="control-label col-lg-2">Nama Form*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('nama_form', null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-2">Path*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('path',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  		</div>
		  		</div>
		  		@include('widgets.submit_button')
				{!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection