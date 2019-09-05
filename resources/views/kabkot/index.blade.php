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
									@if (empty($user->provinceDetail->lokasi_propinsi))

										{!! Form::select('propinsi_id', 
											$provinces, 
											null, 
											['id' => 'provinces',
											 'class' => 'form-control']) !!}

									@elseif (!empty($user->provinceDetail->lokasi_propinsi))

										{!! Form::select('propinsi_id', 
											$provinces, 
											$user->provinceDetail->lokasi_propinsi.'-'.$user->provinceDetail->lokasi_nama, 
											['id' => 'provinces',
											 'class' => 'form-control',
											 'disabled' => 'disabled']) !!}

									@endif
									</div>
									<div class="col-xs-3">
									@if (empty($user->cityDetail->lokasi_kabupatenkota))

										{!! Form::select('kota_id', ['00' => 'Pilih Kabupaten/Kota'], null, ['id' => 'cities', 'class' => 'form-control']) !!}

									@elseif (!empty($user->cityDetail->lokasi_kabupatenkota))

										{!! Form::select('kota_id', 
											['00' => 'Pilih Kabupaten/Kota'], 
											null, 
											['id' => 'cities', 
											 'class' => 'form-control',
											 'disabled' => 'disabled']) !!}

									@endif
									</div>
									<div class="col-xs-3">
										<button class="btn btn-success" type="button" id="search">
											<i class="icon-search4"></i> Cari
										</button>
									</div>
								</div>
							</div>
							<div class="col-lg-12">&nbsp;</div>
						</div>
						<div id="result"></div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div id="faqs"></div>
					</div>
				</div>
			</div>
      	</div>
   	</div>
</div>
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn btn-link pull-right" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript">
$(function() {
	$("#myModal").on("show.bs.modal", function(e) {
	    var link = $(e.relatedTarget);
	    $(this).find(".modal-body").load(link.attr("href"));
	});

	var currentProvinceId = $('#provinces').val();
	@if(isset($user->cityDetail))
		getCities(currentProvinceId, function(){
			$('#cities').val('<?=$user->cityDetail->lokasi_kabupatenkota?>');
		});
    @else
        getCities(currentProvinceId);
	@endif
    $('#provinces').change(function() {
        var provinceId = this.value;
        getCities(provinceId);
    });

    setTimeout(function() {
	    if ($("#cities").val() != '00') {
	    	ajaxProfile();
	    }
	}, 200);

    $("#search").click(function(){
    	ajaxProfile();
    });

});

function ajaxProfile() {
	var province = $("#provinces").val().split("-");
	var city = $("#cities").val();
	$.ajax({
        url: base_url + '/profile/kabkot',
        data: {
        	province: province[0],
        	city: city
        },
        type: 'GET',
        datatype: 'JSON',
        success: function (result) {
        	var html = "";
        	var faqs = "";
            if (result.success) {
            	
            	@foreach ($rows as $key => $row)
	               faqs += '<div class="col-md-4">'
	                  +'<div class="panel panel-flat border-top-xlg border-top-warning">'
		                     +'<div class="panel-heading">'
		                        +'<b>{{ strtoupper($row) }}</b>'
		                     +'</div>'
		                  +'<div class="panel-body">'
		                  	+'<a href="'+base_url+'/faqs-modal/{{$key}}/'+result.lokasiKode+'" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-sm">Tampilkan</a>'
		                  +'</div>'
		                +'</div>'
		              +'</div>';
	            @endforeach

            	html = '<div class="col-lg-3">'
							+'<div class="thumbnail no-padding">'
								+'<div class="thumb">'
									+'<img src="/logo_kabkot/'+result.data.logo+'" alt="">'
								+'</div>'
						    	+'<div class="caption text-center">'
						    		+'<h6 class="text-semibold no-margin"></h6>'
						    	+'</div>'
					    	+'</div>'
						+'</div>'
						+'<div class="col-lg-9">'
							+'<div class="table-responsive">'
								+'<table class="table table-striped">'
									+'<tbody>'
										+'<tr>'
											+'<td width="25%">Nama Provinsi</td>'
											+'<td width="75%">'+result.data.nama_propinsi+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Nama Kabupaten/Kota</td>'
											+'<td>'+result.data.nama_kabupatenkota+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Kriteria Sistem Perkotaan Nasional</td>'
											+'<td>'+isNull(result.data.kriteria_sistem_perkotaan_nasional)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Kriteria Prioritas Pembangunan Perkotaan Nasional</td>'
											+'<td>'+isNull(result.data.kriteria_prioritas_pembangunan_perkotaan_nasional)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Kriteria Kota Rawan Air Dan Sanitasi</td>'
											+'<td>'+isNull(result.data.kriteria_kota_rawan_air_dan_sanitasi)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>KSPN 1</td>'
											+'<td>'+isNull(result.data.kspn_1)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>KSPN 2</td>'
											+'<td>'+isNull(result.data.kspn_2)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>KSPN 3</td>'
											+'<td>'+isNull(result.data.kspn_3)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>KSPN 4</td>'
											+'<td>'+isNull(result.data.kspn_4)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>KSPN 5</td>'
											+'<td>'+isNull(result.data.kspn_5)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Indeks Risiko Bencana</td>'
											+'<td>'+isNull(result.data.indeks_risiko_bencana)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Tingkat Risiko Bencana</td>'
											+'<td>'+isNull(result.data.tingkat_risiko_bencana)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Risiko Bencana Dominan</td>'
											+'<td>'+isNull(result.data.risiko_bencana_dominan)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Luas Wilayah</td>'
											+'<td>'+isNull(result.data.luas_wilayah)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Angka Luas Wilayah</td>'
											+'<td>'+isNull(result.data.angka_luas_wilayah)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Satuan Luas Wilayah</td>'
											+'<td>'+isNull(result.data.satuan_luas_wilayah)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2011</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2011)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2012</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2012)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2013</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2013)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2014</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2014)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2015</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2015)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2016</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2016)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2017</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2017)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2018</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2018)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Kota 2019</td>'
											+'<td>'+isNull(result.data.jml_penduduk_kota_2019)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2011</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2011)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2012</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2012)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2013</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2013)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2014</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2014)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2015</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2015)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2016</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2016)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2017</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2017)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2018</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2018)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Jumlah Penduduk Desa 2019</td>'
											+'<td>'+isNull(result.data.jml_penduduk_desa_2019)+'</td>'
										+'</tr>'
										+'<tr>'
											+'<td>Deskripsi</td>'
											+'<td>'+isNull(result.data.deskripsi)+'</td>'
										+'</tr>'
									+'</tbody>'
								+'</table>'
							+'</div>'
						+'</div>';
            } else {
            	html = '<div class="col-lg-3">'+result.data+'</div>'
            }

            $("#result").html(html)
            $("#faqs").html(faqs)
        }
    })
}

function isNull(str) {
	return (str) ? str : '-';
}

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