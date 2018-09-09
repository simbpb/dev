@extends('layouts.app')
@section('title', 'Asian Games')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               	<h5 class="panel-title">
               		<i class="icon-user position-left"></i>
               		<a href="{{ Navigation::adminUrl('/details/'.$path) }}">@yield('title')</a> 
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
				    {{ Form::model($model, ['id' => 'model-form','class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) }}
				@else
				    {{ Form::open(['id' => 'model-form','class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) }}
				@endif
				<div class="row"> 
					<div class="col-lg-6">
						<div class="form-group">
				    		<label class="control-label col-lg-3">Thn Periode Kegiatan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('thn_periode_keg',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Nama Kegiatan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('nama_kegiatan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>

				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Biaya Pelaksanaan Kontraktor*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('biaya_pelaksanaan_kontraktor',null, ['class' => 'form-control','placeholder' => 'Gunakan format rupiah (Rp)']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Manajemen Konstruksi*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('manajemen_konstruksi',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Permasalahan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('permasalahan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Tindak Lanjut*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('tindak_lanjut',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>

			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
			  				<div class="col-lg-6">
					  			<div class="form-group">
						    		<label class="control-label col-lg-4">Rencana Keu*</label>
						    		<div class="col-lg-8"> 
							    		{!! Form::text('rencana_keu',null, ['class' => 'form-control', 'placeholder' => 'Dalam persen (%)']) !!}
							    	</div>
						  		</div>
					  		</div>
					  		<div class="col-lg-6">
						  		<div class="form-group">
						    		<label class="control-label col-lg-4">Realisasi Keu*</label>
						    		<div class="col-lg-8"> 
							    		{!! Form::text('realisasi_keu',null, ['class' => 'form-control', 'placeholder' => 'Dalam persen (%)']) !!}
							    	</div>
						  		</div>
					  		</div>
				  		</div>
				  		<div class="form-group">
			  				<div class="col-lg-6">
					  			<div class="form-group">
						    		<label class="control-label col-lg-4">Rencana Fisik*</label>
						    		<div class="col-lg-8"> 
							    		{!! Form::text('rencana_fisik',null, ['class' => 'form-control', 'placeholder' => 'Dalam persen (%)']) !!}
							    	</div>
						  		</div>
					  		</div>
					  		<div class="col-lg-6">
						  		<div class="form-group">
						    		<label class="control-label col-lg-4">Realisasi Fisik*</label>
						    		<div class="col-lg-8"> 
							    		{!! Form::text('realisasi_fisik',null, ['class' => 'form-control', 'placeholder' => 'Dalam persen (%)']) !!}
							    	</div>
						  		</div>
					  		</div>
				  		</div>
				  		<div class="form-group">
			  				<div class="col-lg-6">
					  			<div class="form-group">
						    		<label class="control-label col-lg-4">Mk Keu*</label>
						    		<div class="col-lg-8"> 
							    		{!! Form::text('mk_keu',null, ['class' => 'form-control', 'placeholder' => 'Dalam persen (%)']) !!}
							    	</div>
						  		</div>
					  		</div>
					  		<div class="col-lg-6">
						  		<div class="form-group">
						    		<label class="control-label col-lg-4">Mk Fisik*</label>
						    		<div class="col-lg-8"> 
							    		{!! Form::text('mk_fisik',null, ['class' => 'form-control', 'placeholder' => 'Dalam persen (%)']) !!}
							    	</div>
						  		</div>
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Propinsi*</label>
				    		<div class="col-lg-10"> 
					  			{!! Form::select('propinsi_id', $provinces, null, ['id' => 'provinces', 'class' => 'form-control']) !!}
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Kabupaten/Kota*</label>
				    		<div class="col-lg-10"> 
					  			{!! Form::select('kota_id', ['' => 'Pilih Kabupaten/Kota'], null, ['id' => 'cities', 'class' => 'form-control']) !!}
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Dokumentasi*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('dokumentasi',null, ['class' => 'form-control']) !!}
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
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript">
$(function() {
	@if(isset($model))
		var currentProvinceId = $('#provinces').val();
		getCities(currentProvinceId, function(){
			$('#cities').val('<?=$model['kota_id']?>');
		});
	@endif
    $('#provinces').change(function() {
        var provinceId = this.value;
        getCities(provinceId);
    });
});

function getCities(provinceId, callback) {
	$('#cities').find('option').not(':first').remove();
	$.ajax({
        url: base_url + '/ajax/cities/' + provinceId,
        type: 'GET',
        datatype: 'JSON',
        success: function (result) {
            $.each(result, function (i, item) {
                $('#cities').append($('<option></option>').val(i).html(item));
            });
            callback()
        }
    });
}
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection