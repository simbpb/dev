@extends('layouts.app')
@section('title', 'Bantek')

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
				    		<label class="control-label col-lg-3">Nama Bgn yg Difasilitasi*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('nama_bgn_yg_difasilitasi',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Nama Penyelenggara*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('nama_penyelenggara',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Waktu Penyelenggara*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('waktu_penyelenggara',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Uraian Sasaran*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('uraian_sasaran',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Materi Kepmen No. 332 thn 2002 Disampaikan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('materi_kepmen_no332thn2002_disampaikan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Materi Juknis Pt Disampaikan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('materi_juknis_pt_disampaikan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Materi Keppres No. 80 thn 2003 Disampaikan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('materi_keppres_no80thn2003_disampaikan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  	</div>
			  		<div class="col-lg-6">
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Materi HSBGN Disampaikan*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('materi_hsbgn_disampaikan',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Materi Kepmen No. 29 thn 2006 Disampaikan*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('materi_kepmen_no29thn2006_disampaikan',null, ['class' => 'form-control']) !!}
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
				    		<label class="control-label col-lg-2">File Upload Materi Bimtek*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::file('file_upload_materi_bimtek',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['file_upload_materi_bimtek']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Attach File</label>
					    	<div class="col-lg-10">
					    		{!! ($model['file_upload_materi_bimtek']) ? $model['file_upload_materi_bimtek'] : null !!}
					    	</div>
				  		</div>
				  		@endif
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Foto Keg Bimtek*</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::file('foto_keg_bimtek',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		@if (!empty($model['foto_keg_bimtek']))
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Attach File</label>
					    	<div class="col-lg-10">
					    		{!! ($model['foto_keg_bimtek']) ? $model['foto_keg_bimtek'] : null !!}
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