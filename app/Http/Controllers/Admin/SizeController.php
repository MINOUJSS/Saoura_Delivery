<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\size;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class SizeController extends Controller
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
        $sizes=size::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        return view('admin.sizes',compact('sizes'));
    }
    public function create()
    {
        return view('admin.create-size');
    }

    public function store(Request $request)
    {
        //validattion
        $this->validate($request,[
            'size_name' => 'required|min:3',
            'size_size' => 'required'
        ]);
        //save data
        $size= new size;            
        $size->user_id=$request->input('size_user_id');                           
        $size->name=$request->input('size_name');
        $size->size=$request->input('size_size');
        $size->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة المقاس '.$size->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.sizes');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('إضافة مقاس', 'تم إضافة مقاس بنجاح');

        //redirecte to category page
        return redirect()->back();
    }

    public function edit($id)
    {
        if($id==1)
        {
            redirect()->back();
        }else{
        $size=size::findOrFail($id);
        return view('admin.edit-size',compact('size'));
        }
    }

    public function update(Request $request)
    {
                //validattion
                $this->validate($request,[
                    'size_name' => 'required|min:3',
                    'size_size' => 'required'
                ]);
                //update data
                $size=size::findOrFail($request->input('size_size_id'));
                $size->user_id=$request->input('size_user_id');                           
                $size->name=$request->input('size_name');
                $size->size=$request->input('size_size');
                $size->update();
                //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل المقاس '.$size->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.sizes');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
                //alert success message
                Alert::success('تعديل مقاس', 'تم تعديل مقاس بنجاح');
        
                //redirecte to category page
                return redirect()->back();
    }

    public function destroy($id)
    {
        if($id==1)
        {
            return redirect()->back();
        }else
        {
            $size=size::findOrFail($id);
            $size->delete();
            //
            //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف المقاس '.$size->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.sizes');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
            return redirect()->back();
        }
    }
}
