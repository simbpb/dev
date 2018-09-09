@extends('layouts.app')
@section('title', 'RTBL')

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
				    		<label class="control-label col-lg-3">No. Perbub Perwal*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('no_perbub_perwal',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Tgl Penetapan Perbub Perwal*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('tgl_penetapan_perbub_perwal',null, ['class' => 'form-control daterange-single']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Usulan Kawasan RTBL*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('usulan_kws_rtbl',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Luas Kawasan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('luas_kws',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Satuan Luas Kawasan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('satuan_luas_kws',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Tahun RTBL*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('tahun_rtbl',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
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
				    		<label class="control-label col-lg-3">Cakupan Wilayah*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('cakupan_wilayah',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  			<div class="form-group">
				    		<label class="control-label col-lg-3">Uraian Karakter Lokasi*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('uraian_karakter_lokasi',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Uraian Usulan Kawasan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('uraian_usulan_kws',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">File Upload Perbub Perwal*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::file('file_upload_perbub_perwal',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['file_upload_perbub_perwal']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Attach File</label>
					    	<div class="col-lg-9">
					    		{!! ($model['file_upload_perbub_perwal']) ? $model['file_upload_perbub_perwal'] : null !!}
					    	</div>
				  		</div>
				  		@endif
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">File Upload RTBL*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::file('file_upload_rtbl',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['file_upload_rtbl']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Attach File</label>
					    	<div class="col-lg-9">
					    		{!! ($model['file_upload_rtbl']) ? $model['file_upload_rtbl'] : null !!}
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
<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
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

    $('.daterange-single').pickadate({ 
        format: 'dd/mm/yyyy',
        formatSubmit: 'yyyy-mm-dd',
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