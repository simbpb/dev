@extends('layouts.app')
@section('title', 'Struktur Program')
@section('breadcrumb')
	<li><a href="/si-bpb/struktur-program">@yield('title')</a></li>
	<li class="active">{!! (isset($model)) ? 'Edit' : 'Tambah' !!} @yield('title')</li>
@endsection
@section('content')
<div class="page-header">
	<h1>{!! (isset($model)) ? 'Edit' : 'Tambah' !!} @yield('title')</h1>
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
					@if(isset($model))
					    {{ Form::model($model, ['id' => 'form-input', 'class'=>'form-horizontal']) }}
					@else
					    {{ Form::open(['id' => 'form-input', 'class'=>'form-horizontal']) }}
					@endif
						<fieldset>
							<div class="form-group">
					    		<label class="control-label col-sm-3">Level*</label>
					    		<div class="col-sm-5">
						    		{!! Form::select('level', $levels, null, ['placeholder' => 'Pilih Level','class' => 'form-control','id' => 'select-level']) !!}
						    	</div>
					  		</div>
				  			<div class="form-group output" style="display: none;">
					  			<label class="control-label col-sm-3">Output*</label>
					  			<div class="col-sm-5">
						    		{!! Form::select('output', $struktur_bpb, null, ['placeholder' => 'Pilih Output','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					    	</div>
					    	<div class="form-group suboutput" style="display: none;">
					  			<label class="control-label col-sm-3">Suboutput*</label>
					  			<div class="col-sm-5">
						    		{!! Form::select('suboutput', [], null, ['placeholder' => 'Pilih Suboutput','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					    	</div>
					    	<div class="form-group komponen" style="display: none;">
					  			<label class="control-label col-sm-3">Komponen*</label>
					  			<div class="col-sm-5">
						    		{!! Form::select('komponen', [], null, ['placeholder' => 'Pilih Komponen','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					    	</div>
					    	<div class="form-group aktifitas1" style="display: none;">
					  			<label class="control-label col-sm-3">Aktifitas 1*</label>
					  			<div class="col-sm-5">
						    		{!! Form::select('aktifitas1', [], null, ['placeholder' => 'Pilih Aktifitas 1','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					    	</div>
					    	<div class="form-group aktifitas2" style="display: none;">
					  			<label class="control-label col-sm-3">Aktifitas 2*</label>
					  			<div class="col-sm-5">
						    		{!! Form::select('aktifitas2', [], null, ['placeholder' => 'Pilih Aktifitas 2','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					    	</div>
					    	<div class="form-group aktifitas3" style="display: none;">
					  			<label class="control-label col-sm-3">Aktifitas 3*</label>
					  			<div class="col-sm-5">
						    		{!! Form::select('aktifitas3', [], null, ['placeholder' => 'Pilih Aktifitas 3','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					    	</div>
					    	<div class="form-group aktifitas4" style="display: none;">
					  			<label class="control-label col-sm-3">Aktifitas 4*</label>
					  			<div class="col-sm-5">
						    		{!! Form::select('aktifitas4', [], null, ['placeholder' => 'Pilih Aktifitas 4','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					    	</div>
					  		<div class="form-group uraian" style="display: none;">
					    		<label class="control-label col-sm-3">Uraian*</label>
					    		<div class="col-sm-7">
						    		{!! Form::text('uraian',null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					  		</div>
					  		<div class="form-group sub-bidang" style="display: none;">
					    		<label class="control-label col-sm-3">Sub Bidang*</label>
					    		<div class="col-sm-5">
						    		{!! Form::select('sub_bidang', $sub_bid, null, ['placeholder' => 'Pilih Sub Bidang','class' => 'form-control', 'disabled' => 'disabled']) !!}
						    	</div>
					  		</div>
					  		<div class="form-group jenis-volume" style="display: none;">
					    		<label class="control-label col-sm-3">Jenis Volume*</label>
					    		<div class="col-sm-5">
						    		{!! Form::select('jenis_volume', $satuan, null, ['placeholder' => 'Pilih Satuan','class' => 'form-control', 'disabled' => 'disabled']) !!}
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
<script type="text/javascript" src="{{ asset('js/modules/struktur-program/form.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#form-input') !!}
@endsection