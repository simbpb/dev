@extends('layouts.app')
@section('title', 'Ubah Password')
@section('content')
<div class="page-container">
   	<div class="page-content">
      	<div class="content-wrapper">
         	<div class="panel panel-flat">
	            <div class="panel-heading">
	               <h5 class="panel-title"><i class="icon-lock position-left"></i> @yield('title')</h5>
	               <div class="heading-elements">
	                  <ul class="icons-list">
	                     <li><a data-action="collapse"></a></li>
	                  </ul>
	               </div>
	            </div>
	            {{ Form::open(['id' => 'user-form']) }}
	            <div class="panel-body">
	            	<div class="row">
	            		<div class="col-xs-12">
			      			@include('widgets.message')
			      			@include('widgets.error')
			      		</div>
						<div class="col-xs-4">
							<div class="form-group {{ $errors->has('now_password') ? 'has-error' : ''}}">
					    		<label>Password lama*</label>
					    		<input type="password" class="form-control" name="now_password">
					    		{!! $errors->first('now_password', '<span class="help-block error-help-block">:message</span>') !!}
					  		</div>
					  		<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
					    		<label>Password baru*</label>
					    		<input type="password" class="form-control" name="password">
					    		{!! $errors->first('password', '<span class="help-block error-help-block">:message</span>') !!}
					  		</div>
					  		<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
					    		<label>Konfirmasi password*</label>
					    		<input type="password" class="form-control" name="password_confirmation">
					    		{!! $errors->first('password_confirmation', '<span class="help-block error-help-block">:message</span>') !!}
					  		</div>
					  	</div>
				  	</div>
				  	@include('widgets.submit_button')
				</div>
				{!! Form::close() !!}
			</div>
      	</div>
   	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#user-form') !!}
@endsection