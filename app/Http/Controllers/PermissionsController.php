<?php
namespace App\Http\Controllers;

use DB;
use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Menu\MenuRepository;
use App\Models\Permission\PermissionRepository;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller {
    
    protected $model;
    protected $menu;

    public function __construct(
        PermissionRepository $permission,
        MenuRepository $menu
    ) {
        $this->model = $permission;
        $this->menu = $menu;
    }
    
    protected function validationRules($id = 0) {
        $rule['name'] = 'required|unique:permissions'. ($id ? ",id,$id" : '');
        $rule['alias'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('permissions.index');
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
                return redirect(Navigation::adminUrl('/permissions'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $options = $this->menu->getOptions();
        $validator = JsValidator::make($this->validationRules());

        return view('permissions.form', compact('options','validator'));
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules($id));
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/permissions'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $options = $this->menu->getOptions();
        $validator = JsValidator::make($this->validationRules($id));
        $model = $this->model->find($id);

        return view('permissions.form', compact('options','model','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('permissions.view', compact('model'));
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

