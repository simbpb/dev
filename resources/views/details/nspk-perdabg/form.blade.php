@extends('layouts.app')
@section('title', 'NSPK Perdabg')

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
				    		<label class="control-label col-lg-3">Status Perdabg*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('status_perdabg',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">No. Perdabg*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('no_perdabg',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Tempat Penetapan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('tempat_penetapan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Tgl Input Perdabg*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('tgl_input_perdabg',null, ['class' => 'form-control daterange-single']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Thn Perdabg*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('thn_perdabg',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Nama Pejabat yg Menetapkan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('nama_pejabat_yg_menetapkan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  		</div>
			  		<div class="col-lg-6">
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
				    		<label class="control-label col-lg-2">File*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::file('file_upload',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['file_upload']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Attach File</label>
					    	<div class="col-lg-10">
					    		{!! ($model['file_upload']) ? $model['file_upload'] : null !!}
					    	</div>
				  		</div>
				  		@endif
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Keterangan*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::textarea('keterangan',null, ['class' => 'form-control']) !!}
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