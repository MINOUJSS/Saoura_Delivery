<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\brand;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class BrandController extends Controller
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
        $brands=brand::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        return view('admin.brands',compact('brands'));
    }
    public function create()
    {
        return view('admin.create-brand');
    }

    public function store(Request $request)
    {
        //validattion
        $this->validate($request,[
            'brand_name' => 'required|min:3'
        ]);
        //save data
        $brand= new brand;
        //check if upload image for this brand
        if($file=$request->file('brand_image'))
        {
            $extention=$request->file('brand_image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/brands',$imagename))
            {
                //insert into database;
                $brand->image=$imagename;
            }else
            {
                $brand->image='/';
            }
        }else
        {
            $brand->image='/';  
        } 
        $brand->user_id=$request->input('brand_user_id');                           
        $brand->name=$request->input('brand_name');
        $brand->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة العلامة التجارية '.$brand->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.brands');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('إضافة علامة تجارية', 'تم إضافة علامة تجارية بنجاح');

        //redirecte to category page
        return redirect()->back();

    }

    public function edit($id)
    {
        $brand=brand::findOrFail($id);
        return view('admin.edit-brand',compact('brand'));
    }

    public function update(Request $request)
    {
                //validattion
                $this->validate($request,[
                    'brand_name' => 'required|min:3'
                ]);
                //save data
                $brand=brand::findOrFail($request->input('brand_brand_id'));
                //check if upload image for this brand
                if($file=$request->file('brand_image'))
                {
                    //delete old image from brands folder
                    $old_image=$brand->image;
                        if(\File::exists(public_path('admin-css/uploads/images/brands/'.$old_image)))
                    {
                        \File::delete(public_path('admin-css/uploads/images/brands/'.$old_image));
                    }    
                    $extention=$request->file('brand_image')->getClientOriginalExtension();
                    $imagename=time().'.'.$extention;
                    if($file->move('admin-css/uploads/images/brands',$imagename))
                    {
                        //insert into database;
                        $brand->image=$imagename;
                    }else
                    {
                        $brand->image='/';
                    }
                } 
                $brand->user_id=$request->input('brand_user_id');                           
                $brand->name=$request->input('brand_name');
                $brand->update();
                //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل العلامة التجارية '.$brand->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.brands');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
                //alert success message
                Alert::success('تعديل علامة تجارية', 'تم تعديل علامة تجارية بنجاح');
                //redirecte to category page
                return redirect()->back();
    }

    public function destroy($id)
    {
        $brand=brand::findOrFail($id);
        $brand_name=$brand->name;
        //delete old image from categories folder
        $old_image=$brand->image;
        if(\File::exists(public_path('admin-css/uploads/images/brands/'.$old_image)))
        {
          \File::delete(public_path('admin-css/uploads/images/brands/'.$old_image));
        } 
        //delete brand data
        $brand->delete();
                //noteficte admin
                $note=new admin_notefication;
                $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف العلامة التجارية '.$brand_name;
                $note->icon ='fa fa-info-circle';
                $note->type=1;
                $note->link=route('admin.brands');
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
