@extends('layouts.app')
@section('title', 'STANDAR HARGA SATUAN BANGUNAN GEDUNG NEGARA (HSBGN)')
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
				    		<label class="control-label col-lg-3">Thn Periode Kegiatan*</label>
				    		<div class="col-lg-9"> 
					    		@php
                                  $thn = ['' => 'Pilih Tahun'];
                                  for ($i=2010; $i<2020; $i++) {
                                    $thn[$i] = $i;
                                  }
                                  @endphp
                                  {!! Form::select('thn_periode_keg', $thn, null, ['class' => 'form-control']) !!}
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
                            <label class="control-label col-lg-3">Nama Kecamatan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_kecamatan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-lg-3">Tahun Penetapan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tahun_penetapan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        

                        <div class="form-group">
                            <label class="control-label col-lg-3">Angka Luas Wilayah</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('angka_luas_wilayah',null, ['class' => 'form-control number']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Satuan Luas Wilayah</label>
                            <div class="col-lg-9"> 
                                {!! Form::select('satuan_luas_wilayah',
				[
				'km2'=>'km2',
				'HA'=>'HA'
				],
				null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Zona</label>
                            <div class="col-lg-9"> 
                                {!! Form::select('zona',
				[
				'Zona 1'=>'Zona 1',
				'Zona 1 (Daratan)'=>'Zona 1 (Daratan)',
				'Zona 2'=>'Zona 2',
				'Zona 2 (Binta Pesisir)'=>'Zona 2 (Binta Pesisir)',
				'Zona 3'=>'Zona 3',
				'Zona 3 (Tambelan)'=>'Zona 3 (Tambelan)',
				'Zona 4'=>'Zona 4',
                                'Zona 5'=>'Zona 5',
                                'Zona 6'=>'Zona 6',
                                'Zona Darat'=>'Zona Darat',
                                'Zona Kepulauan'=>'Zona Kepulauan'		
				],
				null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Bangunan Tidak Sederhana</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('bg_tidak_sederhana',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Bangunan Sederhana</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('bg_sederhana',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rumah Negara Tipe A</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rumahnegara_tipe_a',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rumah Negara Tipe B</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rumahnegara_tipe_b',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rumah Negara Tipe C, D dan E</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rumahnegara_tipe_c_d_e',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Gedung Negara Depan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_gedungnegara_depan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Gedung Negara Samping</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_gedungnegara_samping',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Gedung Negara Belakang</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_gedungnegara_belakang',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Rumah Negara Depan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_rumahnegara_depan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Rumah Negara Samping</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_rumahnegara_samping',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Rumah Negara Belakang</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_rumahnegara_belakang',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">SK Penetapan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('sk_penetapan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File SK Penetapan HSBGN</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_sk_penetapan_hsbgn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_sk_penetapan_hsbgn']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_sk_penetapan_hsbgn']) ? $model['file_sk_penetapan_hsbgn'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Indeks Kemahalan Konstruksi (IKK) | <a href="https://www.bps.go.id/publication/2018/10/22/e4c1963d3afa1f53f9754fcf/indeks-kemahalan-konstruksi-provinsi-dan-kabupaten-kota-2018.html">Lihat Panduan</a></label>
                            <div class="col-lg-9"> 
                                {!! Form::text('indeks_kemahalan_konstruksi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

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
