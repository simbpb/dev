<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HsbgnController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(Request $request) 
    {
    	if (!Auth::guard('hsbgn')->check()) {
	        if ($request->isMethod('post')) {
                
                $validation = Validator::make($request->all(), [
                    'username' => 'required',
                    'password' => 'required'
                ]);

                if ($validation->fails()) {
                    return redirect()->back()->withInput()->withErrors($validation->errors());
                }

	        	if (Auth::guard('hsbgn')->attempt(['username' => $request->username, 'password' => $request->password], false)) {
			        return redirect('/si-hsbgn');
			    }
			    return redirect()->back()->withInput()->withErrors([
                    'approve' => 'Wrong username or password',
                ]);
	        }

	        return view('auth.hsbgn_login');
	    } else {
            return redirect('/si-hsbgn');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('hsbgn')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/si-hsbgn');
    }
}
