@extends('layouts.app')
@section('title', 'Bg Imb')

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
                            <label class="control-label col-lg-3">No Perbub Perwal*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_perbub_perwal',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl Penetapan Perbub Perwal*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tgl_penetapan_perbub_perwal',null, ['class' => 'form-control']) !!}
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
                            <label class="control-label col-lg-3">No Surat Krk*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_surat_krk',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Permohonan Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_permohonan_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pemilik Perorangan Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_pemilik_perorangan_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pemilik Perorangan Bg Imb Id*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pemilik_perorangan_bg_imb_id',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pemilik Badan Usaha Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_pemilik_badan_usaha_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Akta Pendirian Badan Usaha Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_akta_pendirian_badan_usaha_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Institusi Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_institusi_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Ikmn Pemerintah Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_ikmn_pemerintah_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Hdno Pemerintah Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_hdno_pemerintah_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Propinsi Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('propinsi_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Kabkota Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('kabkota_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Kec Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('kec_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Kel Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('kel_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rt Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rt_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rw Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rw_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Alamat Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('alamat_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Telp Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('telp_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Email Pemilik Bg Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('email_pemilik_bg_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pemilik Tanah*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_pemilik_tanah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Bukti Kepemilikan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_bukti_kepemilikan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jenis Bukti Kepemilikan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jenis_bukti_kepemilikan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Luas Tanah*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('luas_tanah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Satuan Luas Tanah*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('satuan_luas_tanah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Fungsi Bg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('fungsi_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jml Lantai Bg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jml_lantai_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Luas Bg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('luas_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Satuan Luas Bg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('satuan_luas_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Luas Lantai Basement*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('luas_lantai_basement',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">Satuan Lantai Basement*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('satuan_lantai_basement',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl Mulai Konstruksi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tgl_mulai_konstruksi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl Selesai Konstruksi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tgl_selesai_konstruksi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nilai Bg Sesuai Rab*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nilai_bg_sesuai_rab',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Lat Bg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('lat_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Long Bg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('long_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tek Bg Rg Terbuka Hijau Pekarangan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tek_bg_rg_terbuka_hijau_pekarangan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tek Bg Limbah B3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tek_bg_limbah_b3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tek Bg Memiliki Perangkat Penangkal Kebakaran*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tek_bg_memiliki_perangkat_penangkal_kebakaran',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tek Jenis Sanitasi*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tek_jenis_sanitasi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tek Bg Sumber Air*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tek_bg_sumber_air',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Perencanaan Arsitektur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_perencanaan_arsitektur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Perencanaan Arsitektur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_perencanaan_arsitektur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Pelaksana Arsitektur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_pelaksana_arsitektur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Pelaksana Arsitektur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_pelaksana_arsitektur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Pengawas Arsitektur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_pengawas_arsitektur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Pengawas Arsitektur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_pengawas_arsitektur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Perencanaan Struktur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_perencanaan_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Perencanaan Struktur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_perencanaan_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Pelaksana Struktur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_pelaksana_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Pelaksana Struktur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_pelaksana_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Pengawas Struktur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_pengawas_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Pengawas Struktur*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_pengawas_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Perencanaan Utilitas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_perencanaan_utilitas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Perencanaan Utilitas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_perencanaan_utilitas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Pelaksana Utilitas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_pelaksana_utilitas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Pelaksana Utilitas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_pelaksana_utilitas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Penyedia Js Pengawas Utilitas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('penyedia_js_pengawas_utilitas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Serti Js Pengawas Utilitas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_serti_js_pengawas_utilitas',null, ['class' => 'form-control']) !!}
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