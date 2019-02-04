@extends('layouts.app')
@section('title', 'Info Wilayah')
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-key position-left"></i> 
	               	<a href="{{ Navigation::adminUrl('/permissions') }}">@yield('title')</a>
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
				    		<label class="control-label col-lg-3">Nama Provinsi*</label>
				    		<div class="col-lg-9"> 
						    	{!! Form::text('nama_propinsi',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Nama Kabupaten/Kota*</label>
				    		<div class="col-lg-9"> 
						    	{!! Form::text('nama_kabupatenkota',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kriteria Sistem Perkotaan Nasional</label> 
				    		<div class="col-lg-9"> 
						    	{!! Form::text('kriteria_sistem_perkotaan_nasional',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kriteria Prioritas Pembangunan Perkotaan Nasional</label>
				    		<div class="col-lg-9"> 
						    	{!! Form::text('kriteria_prioritas_pembangunan_perkotaan_nasional',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kriteria Kota Rawan Air dan Sanitasi</label>
				    		<div class="col-lg-9"> 
						    	{!! Form::text('kriteria_kota_rawan_air_dan_sanitasi',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">KSPN 1</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('kspn_1',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">KSPN 2</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('kspn_2',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">KSPN 3</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('kspn_3',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">KSPN 4</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('kspn_4',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">KSPN 5</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('kspn_5',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
			  		</div>
		  		</div>
		  		<div class="row"> 
					<div class="col-lg-6">
						<div class="form-group">
				    		<label class="control-label col-lg-3">Indeks Risiko Bencana</label>
				    		<div class="col-lg-9"> 
						    	{!! Form::text('indeks_risiko_bencana',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Tingkat Risiko Bencana</label>
				    		<div class="col-lg-9"> 
						    	{!! Form::text('tingkat_risiko_bencana',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Risiko Bencana Dominan</label> 
				    		<div class="col-lg-9"> 
						    	{!! Form::text('risiko_bencana_dominan',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">Angka Luas Wilayah</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('angka_luas_wilayah',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">Satuan Luas Wilayah</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('satuan_luas_wilayah',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">Luas Wilayah</label>
				    		<div class="col-lg-9"> 
						    	{!! Form::text('luas_wilayah',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
			  		</div>
		  		</div>
		  		<div class="row">
		  			<div class="col-lg-6">
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2011</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2011',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2012</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2012',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2013</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2013',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2014</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2014',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2015</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2015',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2016</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2016',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2017</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2017',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2018</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2018',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Kota 2019</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_kota_2019',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2011</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2011',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2012</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2012',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2013</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2013',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2014</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2014',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2015</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2015',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2016</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2016',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2017</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2017',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2018</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2018',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Jml Penduduk Desa 2019</label>
				    		<div class="col-lg-9">
						    	{!! Form::text('jml_penduduk_desa_2019',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">Deskripsi</label>
				    		<div class="col-lg-9">
						    	{!! Form::textarea('deskripsi',null, ['class' => 'form-control']) !!}
						    </div>
				  		</div>
				  	</div>
				  	<div class="col-lg-6">
			  			<div class="form-group">
			  				<label class="control-label col-lg-3">Logo</label>
			  				<div class="col-lg-9">
					    		<img src="/logo_kabkot/{{ $model->logo }}" style="width: 200px;">
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