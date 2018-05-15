<?php

namespace App\Http\Controllers;

use JsValidator;
use Validator;
use App\Models\Auth\Role;
use Illuminate\Http\Request;
use App\Models\Auth\UserPerdabgRepository;
use App\Models\Auth\UserPerdabgTransformer;

class UserPerdabgController extends Controller
{

    protected $model;

    protected function validationRules($scope = 'create') {
        $rule['nama'] = 'required';
        $rule['email'] = 'required|email';
        $rule['nip'] = 'required';
        $rule['role_id'] = 'required';
        $rule['username'] = 'required';
        if ($scope == 'create') {
            $rule['password'] = 'required';
        }
        return $rule;
    }

    public function __construct(UserPerdabgRepository $user) {
        $this->model = $user;
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = $this->model->list($request->all());
            return (new UserPerdabgTransformer)->transformPaginate($users);
        }
        return view('user_perdabg.index');
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
                return redirect('/si-bpb/user-perdabg');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules());
        $roles = Role::orderBy('id_role_user')->pluck('nama_role_user','id_role_user');

        return view('user_perdabg.form', compact('roles','validator'));
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules('edit'));
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request->all());
                return redirect('/si-bpb/user-perdabg');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules('edit'));
        $roles = Role::orderBy('id_role_user')->pluck('nama_role_user','id_role_user');
        $user = $this->model->find($id);

        return view('user_perdabg.form', compact('user','roles','validator'));
    }

    public function delete($id) 
    {
        $this->model->delete($id);
        return redirect('/si-bpb/user-perdabg');
    }
}
