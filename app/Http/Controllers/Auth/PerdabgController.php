<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerdabgController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(Request $request) 
    {
    	if (!Auth::guard('perdabg')->check()) {
	        if ($request->isMethod('post')) {
                
                $validation = Validator::make($request->all(), [
                    'username' => 'required',
                    'password' => 'required'
                ]);

                if ($validation->fails()) {
                    return redirect()->back()->withInput()->withErrors($validation->errors());
                }

	        	if (Auth::guard('perdabg')->attempt(['username' => $request->username, 'password' => $request->password], false)) {
			        return redirect('/si-perdabg');
			    }
			    return redirect()->back()->withInput()->withErrors([
                    'approve' => 'Wrong username or password',
                ]);
	        }

	        return view('auth.perdabg_login');
	    } else {
            return redirect('/si-perdabg');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('perdabg')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/si-perdabg');
    }
}
