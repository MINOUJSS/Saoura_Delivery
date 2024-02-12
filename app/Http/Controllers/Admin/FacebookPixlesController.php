<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\facebook_pixle;

class FacebookPixlesController extends Controller
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

    public function edit()
    {
        $pixle=facebook_pixle::findORFail(1);
        return view('admin.inc.facebook-pixle.edit',compact('pixle'));
    }

    public function update(Request $request)
    {
        //validate
        $this->validate($request,[
            'code'=>'required'
        ]);
        //update
            $pixle=facebook_pixle::find(1);
            $pixle->active=$request->active;
            $pixle->code=$request->code;
            $pixle->update();
        //success alert
            Alert::success('رائع','تم تعديل كود البيكسل بنجاح');
        //redirect
        return redirect()->back();
    }
}
