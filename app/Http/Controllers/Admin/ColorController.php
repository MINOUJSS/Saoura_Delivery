<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\color;

class ColorController extends Controller
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
        $colors=color::orderBy('id','desc')->paginate(10);
        return view('admin.colors',compact('colors'));
    }
    public function create()
    {
        return view('admin.create-color');
    }

    public function store(Request $request)
    {
        //validattion
        $this->validate($request,[
            'color_name' => 'required|min:3',
            'color_code' => 'required|min:3'
        ]);
        //save data
        $color= new color;            
        $color->user_id=$request->input('color_user_id');                           
        $color->name=$request->input('color_name');
        $color->code=$request->input('color_code');
        $color->save();
        //alert success message
        Alert::success('إضافة لون', 'تم إضافة لون بنجاح');

        //redirecte to category page
        return redirect()->back();
    }

    public function edit($id)
    {
        $color=color::findOrFail($id);
        return view('admin.edit-color',compact('color'));
    }

    public function update(Request $request)
    {
                //validattion
                $this->validate($request,[
                    'color_name' => 'required|min:3'
                ]);
                //save data
                $color=color::findOrFail($request->input('color_color_id'));            
                $color->user_id=$request->input('color_user_id');                           
                $color->name=$request->input('color_name');
                $color->code=$request->input('color_code');
                $color->update();
                //alert success message
                Alert::success('تعديل لون', 'تم تعديل لون بنجاح');
        
                //redirecte to category page
                return redirect()->back();
    }

    public function destroy($id)
    {
        $color=color::findOrFail($id);
        //delete color
        $color->delete();
        //redirect
        return redirect()->back();
    }
}
