@extends('layouts.app')
@section('title', 'Menu')
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-menu7 position-left"></i> 
               		<a href="{{ Navigation::adminUrl('/menus') }}">@yield('title')</a>
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
				    		<label class="control-label col-lg-2">Nama Menu*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('name',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Url</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('url',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Parent Menu</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::select('parent_id', ['' => 'Pilih Menu'] + $options, null, ['id' => 'menu','class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
						<div class="form-group">
				    		<label class="control-label col-lg-2">Icon*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('icon',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Order*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('order',null, ['class' => 'form-control']) !!}
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
<script>
$(function() {
	$('#menu').select2();
});
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection