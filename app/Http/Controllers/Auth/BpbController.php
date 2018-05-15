<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BpbController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(Request $request) 
    {
    	if (!Auth::guard('bpb')->check()) {
	        if ($request->isMethod('post')) {
                
                $validation = Validator::make($request->all(), [
                    'username' => 'required',
                    'password' => 'required'
                ]);

                if ($validation->fails()) {
                    return redirect()->back()->withInput()->withErrors($validation->errors());
                }

	        	if (Auth::guard('bpb')->attempt(['username' => $request->username, 'password' => $request->password], false)) {
			        return redirect('/si-bpb');
			    }
			    return redirect()->back()->withInput()->withErrors([
                    'approve' => 'Wrong username or password',
                ]);
	        }

	        return view('auth.bpb_login');
	    } else {
            return redirect('/si-bpb');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('bpb')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/si-bpb');
    }
}
