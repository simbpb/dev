@extends('layouts.app')
@section('title', 'Regulasi Perda')

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
                                <label>Perda Bg</label>
                                <div class="form-group"><b>{!! $model['perda_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Perdabg</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_Perdabg'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perda Rt Rw</label>
                                <div class="form-group"><b>{!! $model['perda_rt_rw'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File RTRW</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_RTRW'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perda Rd Tr</label>
                                <div class="form-group"><b>{!! $model['perda_rd_tr'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File RDTR</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_RDTR'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perda Cagar Budaya</label>
                                <div class="form-group"><b>{!! $model['perda_cagar_budaya'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerdaCagarBudaya</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerdaCagarBudaya'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perda Rth</label>
                                <div class="form-group"><b>{!! $model['perda_rth'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerdaRTH</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerdaRTH'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Bgh</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_bgh'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupBGH</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupBGH'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Imb</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupIMB</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupIMB'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Slf</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_slf'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>File PerbupSLF</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupSLF'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Rtbl 1</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupRTBL 1</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupRTBL_1'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Rtbl 2</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_2'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupRTBL 2</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupRTBL_2'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Rtbl 3</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_3'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupRTBL 3</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupRTBL_3'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Rtbl 4</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_4'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupRTBL 4</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupRTBL_4'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Rtbl 5</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_5'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupRTBL 5</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupRTBL_5'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Perwal Perbup Rtbl 6</label>
                                <div class="form-group"><b>{!! $model['perwal_perbup_rtbl_6'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File PerbupRTBL 6</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_PerbupRTBL_6'] !!}">
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