<?php

namespace App\Http\Controllers;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Role\RoleRepository;
use App\Models\Menu\MenuRepository;
use App\Http\Controllers\Controller;

class RolesController extends Controller {
    
    protected $model;
    protected $menu;

    public function __construct(
        RoleRepository $role,
        MenuRepository $menu
    ) {
        $this->model = $role;
        $this->menu = $menu;
    }
    
    protected function validationRules() {
        $rule['name'] = 'required';
        $rule['category'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('roles.index');
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
                return redirect(Navigation::adminUrl('/roles'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $menus = $this->menu->getMenuPermission();
        $categories = $this->model->getCategories();
        $validator = JsValidator::make($this->validationRules());

        return view('roles.form', compact('menus','categories','validator'));
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $data = $this->model->update($id, $request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/roles'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $menus = $this->menu->getMenuPermission();
        $categories = $this->model->getCategories();
        $validator = JsValidator::make($this->validationRules('edit'));
        $model = $this->model->find($id);

        return view('roles.form', compact('menus','categories','model','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('roles.view', compact('model'));
    }

    public function setting($id, Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = [];
                foreach ($request->input('permissions') as $key => $value) {
                    $data[] = [
                        'role_id' => $request->input('role_id'),
                        'permission_id' => $value,
                    ];
                }

                $this->model->setting($id, $data);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect('/group');

            } catch (\Exception $e) {
                session()->flash('danger', $e->getMessage());
                return redirect('/group');
            }
        }

        $model = $this->model->find($id);
        $menu = new Menu();
        $menus = $menu->getAllMenus();
        return view('roles.setting', compact('model','menus'));
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

