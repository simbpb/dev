@extends('layouts.app')
@section('title', 'User HSBGN')
@section('breadcrumb')
	<li><a href="/si-bpb/user-hsbgn">@yield('title')</a></li>
	<li class="active">{!! (isset($user)) ? 'Edit' : 'Tambah' !!} User</li>
@endsection
@section('content')
<div class="page-header">
	<h1>{!! (isset($user)) ? 'Edit' : 'Tambah' !!} User</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		@if(count($errors) > 0)
		  	@foreach ($errors->all() as $error)
		  		<div class="alert alert-warning alert-block">
					<button type="button" class="close" data-dismiss="alert">x</button>	
					<strong>{{ $error }}</strong>
				</div>
		  	@endforeach
	  	@endif
		<div class="widget-box">
			<div class="widget-body">
				<div class="widget-main no-padding">
					@if(isset($user))
					    {{ Form::model($user, ['id' => 'user-form']) }}
					@else
					    {{ Form::open(['id' => 'user-form']) }}
					@endif
						<fieldset>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
							    		<label>Nama*</label>
							    		{!! Form::text('nama',null, ['class' => 'form-control']) !!}
							  		</div>
							  		<div class="form-group">
							    		<label>Email*</label>
							    		{!! Form::text('email',null, ['class' => 'form-control']) !!}
							  		</div>
							  		<div class="form-group">
							    		<label>Username*</label>
							    		{!! Form::text('username',null, ['class' => 'form-control']) !!}
							  		</div>
							  	</div>
							  	<div class="col-xs-6">
									<div class="form-group">
							    		<label>NIP*</label>
							    		{!! Form::text('nip',null, ['class' => 'form-control']) !!}
							  		</div>
							  		<div class="form-group">
							    		<label>Password* <small><i>{!! (isset($user)) ? '(kosongkan jika tidak diubah)' : '' !!}</i></small></label>
							    		<input type="password" class="form-control" name="password">
							  		</div>
							  		<div class="form-group">
							    		<label>Role*</label>
							  			{!! Form::select('role_id', $roles, null, ['placeholder' => 'Pilih Role','class' => 'form-control']) !!}
							  		</div>
							  	</div>
						  	</div>
						</fieldset>
						<div class="form-actions center">
							<button type="button" class="btn btn-sm btn-success" onclick="history.back();">
								<i class="ace-icon fa fa-arrow-left"></i> Kembali
							</button>
							<button type="submit" class="btn btn-sm btn-success">
								<i class="ace-icon fa fa-floppy-o"></i> Simpan
							</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#user-form') !!}
@endsection