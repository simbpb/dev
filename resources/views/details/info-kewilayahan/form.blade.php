@extends('layouts.app')
@section('title', 'Info Kewilayahan')

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
                            <label class="control-label col-lg-3">Klasifikasi Berdasarkan Sasaran Utama*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('klasifikasi_berdasarkan_sasaran_utama',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Luas Wilayah Km*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('luas_wilayah_km',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A41 1 Pengembangan Peningkatan Fungsi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a41_1_pengembangan_peningkatan_fungsi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A41 2 Pengembangan Baru*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a41_2_pengembangan_baru',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A41 3 Revitalisasi Kota Yg Telah Berfungsi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a41_3_revitalisasi_kota_yg_telah_berfungsi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A42 Mendorong Pengembangan Kota Sentra Produksi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a42_mendorong_pengembangan_kota_sentra_produksi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A43 1 Pengembangan Peningkatan Fungsi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a43_1_pengembangan_peningkatan_fungsi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A43 2 Pengembangan Baru*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a43_2_pengembangan_baru',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A43 3 Revitalisasi Kota Yg Telah Berfungsi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a43_3_revitalisasi_kota_yg_telah_berfungsi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A44 1 Rehabilitasi Kota Akibat Bencana Alam*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a44_1_rehabilitasi_kota_akibat_bencana_alam',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A44 2 Pengendalian Mitigasi Bencana*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a44_2_pengendalian_mitigasi_bencana',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A51 Lima Kws Metropolitan Br*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a51_lima_kws_metropolitan_br',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A52 Tujuh Kws Perkotaan Metropolitan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a52_tujuh_kws_perkotaan_metropolitan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A53 Duapuluh Kota Otonom*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a53_duapuluh_kota_otonom',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A54 Sepuluh Kota Baru Publik*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a54_sepuluh_kota_baru_publik',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A61 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a61_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A62 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a62_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A63 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a63_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A64 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a64_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A65 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a65_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A66 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a66_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A67 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a67_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A68 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a68_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A69 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a69_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A70 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a70_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">A71 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a71_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A72 Nama Kspn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a72_nama_kspn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A71 Indeks Resiko Bencana*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a71_indeks_resiko_bencana',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A72 1 Resiko Tinggi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a72_1_resiko_tinggi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A72 2 Resiko Sedang*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a72_2_resiko_sedang',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A72 3 Resiko Rendah*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a72_3_resiko_rendah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A73 1 Banjir*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a73_1_banjir',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A73 2 Gempa Bumi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a73_2_gempa_bumi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A73 3 Kebakaran*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a73_3_kebakaran',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A73 4 Tanah Longsor*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a73_4_tanah_longsor',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A73 5 Tsunami*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a73_5_tsunami',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A73 6 Banjir Bandang*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a73_6_banjir_bandang',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">A73 7 Kekeringan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('a73_7_kekeringan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Kota 2014*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_kota_2014',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Kota 2015*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_kota_2015',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Kota 2016*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_kota_2016',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Kota 2017*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_kota_2017',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Kota 2018*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_kota_2018',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Desa 2014*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_desa_2014',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Desa 2015*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_desa_2015',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Desa 2016*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_desa_2016',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Desa 2017*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_desa_2017',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Penduduk Desa 2018*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_penduduk_desa_2018',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

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