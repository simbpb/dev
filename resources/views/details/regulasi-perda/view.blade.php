@extends('layouts.app')
@section('title', 'Regulasi/ Peraturan Daerah (PERDA)')

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
				    		<label>Nama Propinsi</label>
				    		<div class="form-group"><b>{!! $model['nama_propinsi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Kabupaten/Kota</label>
				    		<div class="form-group"><b>{!! $model['nama_kabupatenkota'] !!}</b></div>
				  		</div>
				  		
                            <div class="form-group">
                                <label>Peraturan Daerah tentang Bangunan Gedung (PERDABG)</label>
                                <div class="form-group"><b>{!! $model['perda_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Peraturan Daerah tentang Bangunan Gedung (PERDABG)</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perda_bg'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Peraturan Daerah tentang Rencana Tata Ruang Wilayah (RTRW)</label>
                                <div class="form-group"><b>{!! $model['perda_rt_rw'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Peraturan Daerah tentang Rencana Tata Ruang Wilayah (RTRW)</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_rt_rw'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Peraturan Daerah tentang Rencana Detil Tata Ruang (RDTR)</label>
                                <div class="form-group"><b>{!! $model['perda_rd_tr'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Peraturan Daerah tentang Rencana Detil Tata Ruang (RDTR)</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_rd_tr'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Peraturan Daerah tentang Cagar Budaya</label>
                                <div class="form-group"><b>{!! $model['perda_cagar_budaya'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Peraturan Daerah tentang Cagar Budaya</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perda_cagar_budaya'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Peraturan Daerah tentang Ruang Terbuka Hijau (RTH)</label>
                                <div class="form-group"><b>{!! $model['perda_rth'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Peraturan Daerah tentang Ruang Terbuka Hijau (RTH)</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perda_rth'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Bangunan Gedung Hijau (BGH)</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_bgh'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Bangunan Gedung Hijau (BGH)</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_bgh'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Izin Mendirikan Bangunan (IMB)</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Izin Mendirikan Bangunan (IMB)</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_imb'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Sertifikat Laik Fungsi (SLF)</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_slf'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Sertifikat Laik Fungsi (SLF)</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_slf'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-1</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-1</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_rtbl_1'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-2</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_2'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-2</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_rtbl_2'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-3</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_3'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-3</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_rtbl_3'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-4</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_4'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-4</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_rtbl_4'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-5</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_5'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-5</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_rtbl_5'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-6</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_6'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PERDA/ PERWAL/ PERBUP tentang Rencana Tata Bangunan dan Lingkungan (RTBL) ke-6</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_perbup_rtbl_6'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
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
