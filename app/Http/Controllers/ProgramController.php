<?php

namespace App\Http\Controllers;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Program\ProgramRepository;
use App\Models\Renstra\RenstraRepository;
use App\Models\Master\Output\OutputRepository;
use App\Models\Master\Uraian\UraianRepository;
use App\Models\Master\Komponen\KomponenRepository;
use App\Models\Subdit\SubditRepository;
use App\Models\VisiMisi\VisiMisiRepository;
use App\Http\Controllers\Controller;

class ProgramController extends Controller {
    
    protected $model;
    protected $output;
    protected $uraian;
    protected $renstra;
    protected $subdit;
    protected $visimisi;
    protected $komponen;

    public function __construct(
        ProgramRepository $program,
        OutputRepository $output,
        UraianRepository $uraian,
        RenstraRepository $renstra,
        SubditRepository $subdit,
        VisiMisiRepository $visimisi,
        KomponenRepository $komponen
    ) {
        $this->model = $program;
        $this->output = $output;
        $this->uraian = $uraian;
        $this->renstra = $renstra;
        $this->subdit = $subdit;
        $this->visimisi = $visimisi;
        $this->komponen = $komponen;
    }
    
    protected function validationRules() {
        $rule['renstra_id'] = 'required';
        $rule['output_id'] = 'required';
        $rule['suboutput_id'] = 'required_with:output_id';
        $rule['sasaran_id'] = 'required_with:suboutput_id';
        $rule['volume_id'] = 'required_with:output_id';
        $rule['exe_summary_prog'] = 'required';
        $rule['thn_prog'] = 'required';
        $rule['subdit_id'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        // $model = new \App\Helpers\Kodifikasi();
        // echo $model->getKodifikasi(1).'<br/>';
        // echo '033.55.2413.001.001.009.009.005.009.101.000.000.000.000.000.002.003';
        // return;
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('program.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->create($request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/program'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $renstra = $this->renstra->getOptions();
        $output = $this->output->getOptions();
        $uraian = $this->uraian->getOptions();
        $subdit = $this->subdit->getOptions();
        $visimisi = $this->visimisi->getOptions();
        $komponen = $this->komponen->getOptions();
        $visi = $this->visimisi->getVisi();
        $validator = JsValidator::make($this->validationRules());

        return view('program.form', compact('komponen','visi','visimisi','subdit','renstra','output','uraian','validator'));
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/program'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $renstra = $this->renstra->getOptions();
        $output = $this->output->getOptions();
        $uraian = $this->uraian->getOptions();
        $subdit = $this->subdit->getOptions();
        $visimisi = $this->visimisi->getOptions();
        $komponen = $this->komponen->getOptions();
        $visi = $this->visimisi->getVisi();
        $validator = JsValidator::make($this->validationRules());
        $model = $this->model->find($id);

        return view('program.form', compact('komponen','visi','visimisi','model','subdit','renstra','output','uraian','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('program.view', compact('id','model'));
    }

    public function delete($id) 
    {
        try {
            session()->flash('success', 'Data berhasil dihapus');
            $result['success'] = $this->model->destroy($id);
        } catch (\Exception $e) {
            session()->flash('danger', $e->getMessage());
            $result['success'] = false;
        }

        return response()->json($result);
    }
}

