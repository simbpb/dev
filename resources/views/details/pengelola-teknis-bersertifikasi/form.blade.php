@extends('layouts.app')
@section('title', 'Pengelola Teknis Bersertifikasi')

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
					    		{!! Form::hidden('program_id',$programId) !!}
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
                            <label class="control-label col-lg-3">No Sertifikat Pengelola Teknis*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('No_sertifikat_pengelola_teknis',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl Sertifikat Pengelola Teknis*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Tgl_sertifikat_pengelola_teknis',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pejabat*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Nama_Pejabat',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jabatan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Jabatan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pengelola Teknis*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Nama_pengelola_teknis',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No KTP Pengelola Teknis*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('No_KTP_pengelola_teknis',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Dinas Instansi Asal Unit Org*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Dinas_Instansi_asal_Unit_org',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Alamat Lengkap Pengelola Teknis*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Alamat_lengkap_pengelola_teknis',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pendidikan Terakhir Pengelola Teknis*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Pendidikan_terakhir_pengelola_teknis',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jurusan Pendidikan Terakhir*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Jurusan_Pendidikan_terakhir',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Asal Universitas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Asal_Universitas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Bidang Keahlian*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Bidang_Keahlian',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Keterangan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('Keterangan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Sertifikat Pengelola Teknis*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_Sertifikat_pengelola_teknis',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_Sertifikat_pengelola_teknis']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_Sertifikat_pengelola_teknis']) ? $model['file_Sertifikat_pengelola_teknis'] : null !!}
                            </div>
                        </div>
                        @endif 

						<div class="form-group">
				    		<label class="control-label col-lg-3">Status</label>
				    		<div class="col-lg-9">
				    			@if(!empty($model) && $model['is_actived'] == 'ACTIVE')
					    			{!! Form::checkbox('status', 'ACTIVE', $model['is_actived']) !!}
					    		@else
								    {!! Form::checkbox('status', 'ACTIVE') !!}
								@endif
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