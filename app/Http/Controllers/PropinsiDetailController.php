<?php

namespace App\Http\Controllers;

use Auth;
use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Lokasi\LokasiRepository;
use App\Http\Controllers\Controller;
use App\Models\Master\Detail\Detail;
use App\Models\PropinsiDetail\PropinsiDetailRepository;

class PropinsiDetailController extends Controller {
    
    protected $lokasi;
    protected $model;

    public function __construct(
        LokasiRepository $lokasi,
        PropinsiDetailRepository $model
    ) {
        $this->lokasi = $lokasi;
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $provinces = $this->lokasi->getTextProvincesOptions();
        
        if ($request->ajax()) {
            $provinceId = explode("-", $request->get('provinceId'))[0];
            $detail = Detail::select('daftar_form_detail.id','daftar_form_detail.nama_form','propinsi_form_detail.lokasi_propinsi')
                    ->leftJoin('propinsi_form_detail', function($join) use ($provinceId) {
                        $join->on('propinsi_form_detail.daftar_form_detail_id','=','daftar_form_detail.id')
                            ->where('propinsi_form_detail.lokasi_propinsi', $provinceId);
                    })->orderBy('daftar_form_detail.id')
                    ->get();

            return view('propinsi-detail.form',compact('detail'));
        }
        
        return view('propinsi-detail.index',compact('provinces'));
    }

    public function insert(Request $request)
    {
        
        try {
            $this->model->insertAll($request);
            session()->flash('success', 'Data berhasil disimpan');
            return redirect(Navigation::adminUrl('/propinsi-detail'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }    
}

