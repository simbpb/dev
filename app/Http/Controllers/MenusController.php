<?php

namespace App\Http\Controllers;

use DB;
use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Menu\MenuRepository;
use App\Http\Controllers\Controller;

class MenusController extends Controller {
    
    protected $model;

    public function __construct(
        MenuRepository $menu
    ) {
        $this->model = $menu;
    }
    
    protected function validationRules() {
        $rule['name'] = 'required';
        $rule['icon'] = 'required';
        $rule['order'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('menus.index');
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
                return redirect(Navigation::adminUrl('/menus'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $options = $this->model->getOptions();
        $validator = JsValidator::make($this->validationRules());

        return view('menus.form', compact('options','validator'));
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
                return redirect(Navigation::adminUrl('/menus'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $options = $this->model->getOptions();
        $validator = JsValidator::make($this->validationRules('edit'));
        $model = $this->model->find($id);

        return view('menus.form', compact('options','model','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('menus.view', compact('model'));
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

