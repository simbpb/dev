@extends('layouts.app')
@section('title', 'Pengguna')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               	<h5 class="panel-title">
               		<i class="icon-user position-left"></i>
               		<a href="{{ Navigation::adminUrl('/users') }}">@yield('title')</a> 
               		<i class="icon-forward3"></i> {!! (isset($model)) ? 'Ubah' : 'Tambah' !!}
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
				    		<label class="control-label col-lg-2">Nama Lengkap*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('fullname',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Username*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('username',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Email*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::email('email',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
				    		<label class="control-label col-lg-2">Group*</label>
				    		<div class="col-lg-10"> 
					  			{!! Form::select('role_id', $roles, null, ['placeholder' => 'Pilih Group','class' => 'form-control']) !!}
					  		</div>
				  		</div>
			  			<div class="form-group">
				    		<label class="control-label col-lg-2">Password*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::password('password', ['class' => 'form-control']) !!}
					    		<small><i>{!! (isset($model)) ? '(kosongkan jika tidak diubah)' : '' !!}</i></small>
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Status</label>
				    		<div class="col-lg-10">
					    		{!! Form::checkbox('status', '00', $model) !!}
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