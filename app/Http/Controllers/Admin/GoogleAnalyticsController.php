<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\google_analytic;

class GoogleAnalyticsController extends Controller
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
        $analytic=google_analytic::findORFail(1);
        return view('admin.inc.google-analytics.edit',compact('analytic'));
    }

    public function update(Request $request)
    {
        //validate
        $this->validate($request,[
            'code'=>'required'
        ]);
        //update
            $analytic =google_analytic::find(1);
            $analytic->active=$request->active;
            $analytic->code=$request->code;
            $analytic->update();
        //success alert
            Alert::success('رائع','تم تعديل كود التتبع بنجاح');
        //redirect
        return redirect()->back();
    }
}
