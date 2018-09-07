@extends('layouts.app')
@section('title', 'Pelepasan RNG3')

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
				    		<label class="control-label col-lg-3">HD NO. RN*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('hdno_rn',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Nama Penghuni*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('nama_penghuni',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kemen Lembaga*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('kemen_lembaga',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Status RN*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('status_rn',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Tahun Pelepasan RNG3*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('thn_pelepasan_rng3',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Propinsi*</label>
				    		<div class="col-lg-9"> 
					  			{!! Form::select('propinsi_id', $provinces, null, ['id' => 'provinces', 'class' => 'form-control']) !!}
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kabupaten/Kota*</label>
				    		<div class="col-lg-9"> 
					  			{!! Form::select('kota_id', ['' => 'Pilih Kabupaten/Kota'], null, ['id' => 'cities', 'class' => 'form-control']) !!}
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kecamatan*</label>
				    		<div class="col-lg-9"> 
					  			{!! Form::select('kecamatan_id', ['' => 'Pilih Kecamatan'], null, ['id' => 'districts', 'class' => 'form-control']) !!}
					  		</div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">SK Hak Milik*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('sk_hak_milik',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">Alamat RN*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('alamat_rn',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Thn Perjanjian Sewa Beli*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('thn_perjanjian_sewabeli',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">No. SK Gol 3*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('no_sk_gol3',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">File Upload SK Gol 3*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::file('file_upload_sk_gol3',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['file_upload_sk_gol3']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Attach File</label>
					    	<div class="col-lg-9">
					    		{!! ($model['file_upload_sk_gol3']) ? $model['file_upload_sk_gol3'] : null !!}
					    	</div>
				  		</div>
				  		@endif

				  		<div class="form-group">
				    		<label class="control-label col-lg-3">No. SIP Gol 3*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('no_sip_gol3',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">File Upload SIP Gol 3*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::file('file_upload_sip_gol3',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['file_upload_sip_gol3']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Attach File</label>
					    	<div class="col-lg-9">
					    		{!! ($model['file_upload_sip_gol3']) ? $model['file_upload_sip_gol3'] : null !!}
					    	</div>
				  		</div>
				  		@endif

				  		<div class="form-group">
				    		<label class="control-label col-lg-3">No. SK Menteri PUPR*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('no_sk_menteri_pupr',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">File Upload SK Menteri PUPR*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::file('file_upload_sk_menteri_pupr',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['file_upload_sk_menteri_pupr']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Attach File</label>
					    	<div class="col-lg-9">
					    		{!! ($model['file_upload_sk_menteri_pupr']) ? $model['file_upload_sk_menteri_pupr'] : null !!}
					    	</div>
				  		</div>
				  		@endif
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
		var currentCityId = $('#cities').val();
		getCities(currentProvinceId, function(){
			$('#cities').val('<?=$model['kota_id']?>');
		});
		getDistricts(currentProvinceId, '<?=$model['kota_id']?>', function(){
			$('#districts').val('<?=$model['kecamatan_id']?>');
		});
	@endif
    $('#provinces').change(function() {
        var provinceId = this.value;
        getCities(provinceId);
    });

    $('#cities').change(function() {
        var provinceId = $('#provinces').val();
        var cityId = this.value;
        getDistricts(provinceId, cityId);
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

function getDistricts(provinceId, cityId, callback) {
	$('#districts').find('option').not(':first').remove();
	$.ajax({
        url: base_url + '/ajax/districts/' + provinceId + '/' + cityId,
        type: 'GET',
        datatype: 'JSON',
        success: function (result) {
            $.each(result, function (i, item) {
                $('#districts').append($('<option></option>').val(i).html(item));
            });
            callback()
        }
    });
}
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection