@extends('layouts.app')
@section('title', 'Profil Kabupaten/Kota')
@section('content')
<div class="page-container">
   	<div class="page-content">
      	<div class="content-wrapper">
         	<div class="panel panel-flat">
	            <div class="panel-heading">
	               <h5 class="panel-title"><i class="icon-user-tie position-left"></i> @yield('title')</h5>
	               <div class="heading-elements">
	                  <ul class="icons-list">
	                     <li><a data-action="collapse"></a></li>
	                  </ul>
	               </div>
	            </div>
	            <div class="panel-body">
	            	<div class="row">
		            	<div class="form-group">
		            		<div class="col-lg-12">
								<div class="row">
									<div class="col-xs-3">
										{!! Form::select('propinsi_id', $provinces, null, ['id' => 'provinces', 'class' => 'form-control']) !!}
									</div>
									<div class="col-xs-3">
										{!! Form::select('kota_id', ['' => 'Pilih Kabupaten/Kota'], null, ['id' => 'cities', 'class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="col-lg-12">&nbsp;</div>
						</div>
						<div class="col-lg-3">
							<div class="thumbnail no-padding">
								<div class="thumb">
									<img src="/logo_kabkot/Lambang_Kabupaten_Aceh_Barat.png" alt="">
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin"></h6>
						    	</div>
					    	</div>
						</div>
						<div class="col-lg-9">
							<div class="table-responsive">
								<table class="table table-striped">
									<tbody>
										<tr>
											<td width="25%">Nama Provinsi</td>
											<td width="75%">Aceh</td>
										</tr>
										<tr>
											<td>Nama Kabupaten/Kota</td>
											<td>Kabupaten Aceh Barat</td>
										</tr>
										<tr>
											<td>Kode Lokasi</td>
											<td>Kabupaten Aceh Barat</td>
										</tr>
										<tr>
											<td>Kriteria Sistem Perkotaan Nasional</td>
											<td>Kabupaten Aceh Barat</td>
										</tr>
										<tr>
											<td>Kriteria Prioritas Pembangunan Perkotaan Nasional</td>
											<td>Kabupaten Aceh Barat</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
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
@endsection