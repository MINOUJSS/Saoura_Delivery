<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\setting;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.setting');
    }
    public function update(Request $request)
    {
        //validation
        $this->validate($request,[
            'store_name'=>'required|min:4'
        ]);        
        //creat varible
        $store_name=setting::where('var','store_name')->first();
        $phone=setting::where('var','phone')->first();
        $address=setting::where('var','address')->first();
        $email=setting::where('var','email')->first();
        $facebook=setting::where('var','facebook')->first();
        $youtube=setting::where('var','youtube')->first();
        $twitter=setting::where('var','twitter')->first();
        $instagram=setting::where('var','instagram')->first();
        //update
        $store_name->value=$request->store_name;
        $store_name->update();
        $phone->value=$request->phone;
        $phone->update();
        $address->value=$request->address;
        $address->update();
        $email->value=$request->email;
        $email->update();
        $facebook->value=$request->facebook;
        $facebook->update();
        $youtube->value=$request->youtube;
        $youtube->update();
        $twitter->value=$request->twitter;
        $twitter->update();
        $instagram->value=$request->instagram;
        $instagram->update();
        //alert success
        Alert::success('تعديل الإعدادت','تم تعديل إعدادت المتجر بنجاح');
        //redirect
        return redirect()->back();
    }
}
