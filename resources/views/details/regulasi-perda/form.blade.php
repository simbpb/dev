@extends('layouts.app')
@section('title', 'Regulasi/ Peraturan Daerah')
@php
$user = Auth::user();
@endphp
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               	<h5 class="panel-title">
               		<i class="icon-user position-left"></i>
               		<a href="{{ Navigation::adminUrl('/details/'.$path.'/'.$programId) }}">@yield('title')</a> 
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
				    		<label class="control-label col-lg-3">Tahun Periode Kegiatan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('thn_periode_keg',null, ['class' => 'form-control']) !!}
					    		{!! Form::hidden('program_id',$programId) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Propinsi*</label>
				    		<div class="col-lg-9"> 
					  			@if (empty($user->provinceDetail->lokasi_propinsi))

                                    {!! Form::select('propinsi_id', 
                                        $provinces, 
                                        null, 
                                        ['id' => 'provinces',
                                         'class' => 'form-control']) !!}

                                @elseif (!empty($user->provinceDetail->lokasi_propinsi))

                                    {!! Form::select('propinsi_id', 
                                        $provinces, 
                                        isset($model) ? null : $user->provinceDetail->lokasi_propinsi.'-'.$user->provinceDetail->lokasi_nama, 
                                        ['id' => 'provinces',
                                         'class' => 'form-control',
                                         'disabled' => 'disabled']) !!}
                                    {!! Form::hidden('propinsi_id',
                                        $user->provinceDetail->lokasi_propinsi) !!}
                                @endif
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kabupaten/Kota*</label>
				    		<div class="col-lg-9"> 
					  		 @if (empty($user->cityDetail->lokasi_kabupatenkota))

                      {!! Form::select('kota_id', 
                          ['00' => 'Pilih Kabupaten/Kota'], 
                          null, 
                          ['id' => 'cities', 
                          'class' => 'form-control']) !!}

                  @elseif (!empty($user->cityDetail->lokasi_kabupatenkota))

                      {!! Form::select('kota_id', 
                          ['00' => 'Pilih Kabupaten/Kota'], 
                          null, 
                          ['id' => 'cities', 
                           'class' => 'form-control',
                           'disabled' => 'disabled']) !!}

                      {!! Form::hidden('kota_id',
                      $user->cityDetail->lokasi_kabupatenkota) !!}
                  @endif
                </div>
				  		</div>
						
                        <div class="form-group">
                            <label class="control-label col-lg-3">Peraturan Daerah tentang Bangunan Gedung (PERDABG)</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Peraturan Daerah tentang Bangunan Gedung (PERDABG)</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perda_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perda_bg']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perda_bg']) ? $model['file_perda_bg'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Peraturan Daerah tentang Rencana Tata Ruang Wilayah (RTRW)</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rt_rw',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Peraturan Daerah tentang Rencana Tata Ruang Wilayah (RTRW)</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_rt_rw',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_rt_rw']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_rt_rw']) ? $model['file_rt_rw'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Peraturan Daerah tentang Rencana Detil Tata Ruang (RDTR)</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rd_tr',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Peraturan Daerah tentang Rencana Detil Tata Ruang (RDTR)</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_rd_tr',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_rd_tr']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_rd_tr']) ? $model['file_rd_tr'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Peraturan Daerah tentang Cagar Budaya</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_cagar_budaya',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Peraturan Daerah tentang Cagar Budaya</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perda_cagar_budaya',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perda_cagar_budaya']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perda_cagar_budaya']) ? $model['file_perda_cagar_budaya'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Peraturan Daerah tentang Ruang Terbuka Hijau (RTH)</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rth',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Peraturan Daerah tentang Ruang Terbuka Hijau (RTH)</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perda_rth',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perda_rth']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perda_rth']) ? $model['file_perda_rth'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Bangunan Gedung Hijau (BGH)</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_bgh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Bangunan Gedung Hijau (BGH)</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_bgh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_bgh']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_bgh']) ? $model['file_perbup_bgh'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Izin Mendirikan Bangunan (IMB)</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Izin Mendirikan Bangunan (IMB)</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_imb']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_imb']) ? $model['file_perbup_imb'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Sertifikat Laik Fungsi (SLF)</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Sertifikat Laik Fungsi (SLF)</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_slf']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_slf']) ? $model['file_perbup_slf'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-1</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_1',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-1</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_1',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_1']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_1']) ? $model['file_perbup_rtbl_1'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-2</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_2',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-2</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_2',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_2']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_2']) ? $model['file_perbup_rtbl_2'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-3</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-3</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_3']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_3']) ? $model['file_perbup_rtbl_3'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-4</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_4',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-4</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_4',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_4']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_4']) ? $model['file_perbup_rtbl_4'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-5</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_5',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-5</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_5',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_5']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_5']) ? $model['file_perbup_rtbl_5'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-6</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_6',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-6</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_6',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_6']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_6']) ? $model['file_perbup_rtbl_6'] : null !!}
                            </div>
                        </div>
                        @endif 

						<div class="form-group">
				    		<label class="control-label col-lg-3">Status</label>
				    		<div class="col-lg-9">
								{!! Form::checkbox('status', null, isset($model) ? $model['is_actived'] : 0) !!}
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
	var currentProvinceId = $('#provinces').val();
    @if(isset($user->cityDetail))
        getCities(currentProvinceId, function(){
            $('#cities').val('<?=$user->cityDetail->lokasi_kabupatenkota?>');
        });
    @endif
  @if(isset($model))
    getCities(currentProvinceId, function(){
      $('#cities').val('<?=$model['kota_id']?>');
    });
    @else
        getCities(currentProvinceId);
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
