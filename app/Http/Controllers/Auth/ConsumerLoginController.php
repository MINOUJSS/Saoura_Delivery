<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ConsumerLoginController extends Controller
{    
    public function __construct()
    {
        $this->middleware('guest:consumer')->except('logout');
    }

    public function ShowLoginForm()
    {
        return view('auth.consumer.login');
    }

    public function login(Request $request)
    {
        //vlidate data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //atempt to log user in        
        if(Auth::guard('consumer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
        {
            //if successful ,redirect to dashboard
            return redirect()->intended(route('consumer.dashboard',Auth::guard('consumer')->user()->id));
            //return redirect()->back();
        }        
            
        //if unsuccessful redirect back to login form with data
        return redirect(route('consumer.login'))->withInput($request->only('email','remember'))->with('message','تأكد من معلوماتك و كلمة المرور');                        

    }
    public function logout()
    { 
        Auth::guard('consumer')->logout();
        return redirect(route('consumer.login'));
    }
}