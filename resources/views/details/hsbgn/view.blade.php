@extends('layouts.app')
@section('title', 'Hsbgn')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-grid3 position-left"></i> 
	               	<a href="{{ Navigation::adminUrl('/details/'.$path) }}">@yield('title')</a>
	               	<i class="icon-forward3"></i> Rincian  
	           </h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
            	<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
				    		<label>Tahun Periode Kegiatan</label>
				    		<div class="form-group"><b>{!! $model['thn_periode_keg'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Kode Lokasi</label>
				    		<div class="form-group"><b>{!! $model['lokasi_kode'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Propinsi</label>
				    		<div class="form-group"><b>{!! $model['nama_propinsi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Kabupaten/Kota</label>
				    		<div class="form-group"><b>{!! $model['nama_kabupatenkota'] !!}</b></div>
				  		</div>
				  		
                            <div class="form-group">
                                <label>Id Tbl Hsbgn</label>
                                <div class="form-group"><b>{!! $model['id_tbl_hsbgn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Id Info Wilayah</label>
                                <div class="form-group"><b>{!! $model['id_info_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Uraian</label>
                                <div class="form-group"><b>{!! $model['uraian'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tahun Penetapan</label>
                                <div class="form-group"><b>{!! $model['tahun_penetapan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Kecamatan</label>
                                <div class="form-group"><b>{!! $model['nama_kecamatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Wilayah</label>
                                <div class="form-group"><b>{!! $model['luas_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Angka Luas Wilayah</label>
                                <div class="form-group"><b>{!! $model['angka_luas_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Satuan Luas Wilayah</label>
                                <div class="form-group"><b>{!! $model['satuan_luas_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Zona</label>
                                <div class="form-group"><b>{!! $model['zona'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Bg Tidak Sederhana</label>
                                <div class="form-group"><b>{!! $model['bg_tidak_sederhana'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Bg Sederhana</label>
                                <div class="form-group"><b>{!! $model['bg_sederhana'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Rumahnegara Tipe A</label>
                                <div class="form-group"><b>{!! $model['rumahnegara_tipe_a'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Rumahnegara Tipe B</label>
                                <div class="form-group"><b>{!! $model['rumahnegara_tipe_b'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Rumahnegara Tipe C D E</label>
                                <div class="form-group"><b>{!! $model['rumahnegara_tipe_c_d_e'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pagar Gedungnegara Depan</label>
                                <div class="form-group"><b>{!! $model['pagar_gedungnegara_depan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pagar Gedungnegara Samping</label>
                                <div class="form-group"><b>{!! $model['pagar_gedungnegara_samping'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pagar Gedungnegara Belakang</label>
                                <div class="form-group"><b>{!! $model['pagar_gedungnegara_belakang'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pagar Rumahnegara Depan</label>
                                <div class="form-group"><b>{!! $model['pagar_rumahnegara_depan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pagar Rumahnegara Samping</label>
                                <div class="form-group"><b>{!! $model['pagar_rumahnegara_samping'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pagar Rumahnegara Belakang</label>
                                <div class="form-group"><b>{!! $model['pagar_rumahnegara_belakang'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Sk Penetapan</label>
                                <div class="form-group"><b>{!! $model['sk_penetapan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Sk Penetapan Hsbgn</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_sk_penetapan_hsbgn'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Indeks Kemahalan Konstruksi</label>
                                <div class="form-group"><b>{!! $model['indeks_kemahalan_konstruksi'] !!}</b></div>
                            </div>

				  		<div class="form-group">
				    		<label>Status</label>
				    		<div class="form-group"><b>{!! (!empty($model['is_actived'])) ? 'ACTIVE' : 'INACTIVE' !!}</b></div>
				  		</div>
				  	</div>
			  	</div>
			  	<div class="text-right">
					<button class="btn btn-warning" type="button" onclick="history.back();"><i class="icon-undo2"></i> Kembali</button>
				</div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection