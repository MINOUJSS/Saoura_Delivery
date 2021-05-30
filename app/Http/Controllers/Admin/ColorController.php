<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\color;
use App\brand;
use App\admin_notefication;
use App\reading_notification;
use Auth;

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
        $colors=color::orderBy('id','desc')->where('id','!=',1)->paginate(10);
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
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة اللون '.$color->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.colors');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('إضافة لون', 'تم إضافة لون بنجاح');

        //redirecte to category page
        return redirect()->back();
    }

    public function edit($id)
    {
        //check if color is Default
        if($id==1)
        {
            return redirect()->back();
        }else{        
        $color=color::findOrFail($id);
        return view('admin.edit-color',compact('color'));
        }
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
                //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل اللون '.$color->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.colors');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
                //alert success message
                Alert::success('تعديل لون', 'تم تعديل لون بنجاح');
        
                //redirecte to category page
                return redirect()->back();
    }

    public function destroy($id)
    {
        if($id==1)
        {
            return redirect()->back();
        }else{
        $color=color::findOrFail($id);
        $color_name=$color->name;
        //delete color
        $color->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف اللون '.$color_name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.colors');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //redirect
        return redirect()->back();
        }
    }
}
