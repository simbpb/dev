<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use JsValidator;
use Validator;
use Illuminate\Http\Request;
use App\Models\User\UserRepository;
use App\Http\Controllers\Controller;

class ProfileController extends Controller {
    
    protected $model;

    public function __construct(
        UserRepository $user
    ) {
        $this->model = $user;
    }

    protected function validationRules() {
        $rule['now_password'] = 'required';
        $rule['password'] = 'required|min:5|confirmed|different:now_password';
        return $rule;
    }

    public function index()
    {
        $id = Auth::user()->id;
        $model = $this->model->find($id);
        return view('auth.profile',compact('model'));
    }

    public function changePassword(Request $request)
    {
        $id = Auth::user()->id;

        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules());

            if (!(Hash::check($request->get('now_password'), Auth::user()->password))) {
                $validation->after(function($validation) {
                    $validation->errors()->add('now_password', 'Password lama tidak sama');
                });
            }

            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->changePassword($id, $request->get('password'));
                session()->flash('success', 'Password berhasil diubah');
                return redirect(Navigation::adminUrl('/change-password'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules());
        $model = $this->model->find($id);
        return view('auth.change_password',compact('model','validator'));
    }

    public function kabkot()
    {
        $id = Auth::user()->id;
        $model = $this->model->find($id);
        return view('auth.kabkot',compact('model'));
    }

}

