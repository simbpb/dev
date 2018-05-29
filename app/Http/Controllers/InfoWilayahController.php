<?php

namespace App\Http\Controllers;

use JsValidator;
use Validator;
use Illuminate\Http\Request;
use App\Models\InfoWilayah\InfoWilayahRepository;
use App\Models\InfoWilayah\InfoWilayahTransformer;

class InfoWilayahController extends Controller
{

    protected $model;

    protected function validationRules() {
        $rule['level'] = 'required';
        $rule['uraian'] = 'required';
        $rule['sub_bidang'] = 'required';
        $rule['jenis_volume'] = 'required';
        return $rule;
    }

    public function __construct(InfoWilayahRepository $infoWilayah) {
        $this->model = $infoWilayah;
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return (new InfoWilayahTransformer)->transformPaginate($model);
        }
        return view('informasi_wilayah.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->create($request->all());
                return redirect('/si-bpb/struktur-program');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules());
        $levels = Level::orderBy('kd_level')->where('id_level', '>', '001')->get()->pluck('nama_level','id_level');
        $sub_bid = SubBid::orderBy('id_sub_bid')->pluck('nama_sub_bid','nama_sub_bid');
        $satuan = Satuan::orderBy('id_satuan')->pluck('nama_satuan','nama_satuan');
        $struktur_bpb = StrukturBpb::orderBy('id_struktur')->where('id_level', '=', '002')->pluck('uraian','id_struktur');

        return view('struktur_program.form', compact('levels','struktur_bpb','sub_bid','satuan','validator'));
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request->all());
                return redirect('/si-bpb/struktur-program');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules());
        $levels = Level::orderBy('kd_level')->where('id_level', '>', '001')->get()->pluck('nama_level','id_level');
        $sub_bid = SubBid::orderBy('id_sub_bid')->pluck('nama_sub_bid','nama_sub_bid');
        $satuan = Satuan::orderBy('id_satuan')->pluck('nama_satuan','nama_satuan');
        $struktur_bpb = StrukturBpb::orderBy('id_struktur')->where('id_level', '=', '002')->pluck('uraian','id_struktur');
        $struktur_program = $this->model->find($id);
        $model = (new StrukturBpbTransformer)->transformDetail($struktur_program);
        
        return view('struktur_program.form', compact('model','levels','struktur_bpb','sub_bid','satuan','validator'));
    }
}
