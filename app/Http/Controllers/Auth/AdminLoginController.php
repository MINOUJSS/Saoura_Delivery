<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{    
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function ShowLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        //vlidate data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        //atempt to log user in        
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
        {
            //if successful ,redirect to dashboard
            return redirect()->intended(route('admin.dashboard'));
        }        
            
        //if unsuccessful redirect back to login form with data
        return redirect()->back()->withInput($request->only('email','remember'));                        

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
