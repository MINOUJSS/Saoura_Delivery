<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Consumer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Auth;

class ConsumerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:consumer');
    }

    public function ShowRegisterForm()
    {
        return view('auth.consumer.register');
    }

    public function Register(Request $request)
    {
        //validate
        $this->validate($request,[
            'name' =>'required|min:3|max:25',
            'email' =>'required|email|unique:consumers',
            'tel' =>'required|numeric', 
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        //save data
        $consumer=new Consumer;
        $consumer->name=$request->name;
        $consumer->email=$request->email;
        $consumer->telephone=$request->tel;
        $consumer->password=Hash::make($request->password);
        $consumer->save();
        //alert success
        Alert::success('رائع','تم تسجيلك في الموقع بنجاح,تفقد بريدك لإلكتروني لتفعيل حسابك');
        //function to login($email,$password)
        Auth::guard('consumer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember);
        //redirect
        return redirect()->intended(url('consumer/'.$consumer->id.'/dashboard'));    
        //return redirect()->intended(route('consumer.dashboard',$consumer->id));
    }
}
