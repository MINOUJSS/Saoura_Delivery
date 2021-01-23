<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\brand;

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
        $brands=brand::orderBy('id','desc')->paginate(10);
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
        } 
        $brand->user_id=$request->input('brand_user_id');                           
        $brand->name=$request->input('brand_name');
        $brand->save();
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
                $brand->save();
                //alert success message
                Alert::success('تعديل علامة تجارية', 'تم تعديل علامة تجارية بنجاح');
                //redirecte to category page
                return redirect()->back();
    }

    public function destroy($id)
    {
        $brand=brand::findOrFail($id);
        //delete old image from categories folder
        $old_image=$brand->image;
        if(\File::exists(public_path('admin-css/uploads/images/brands/'.$old_image)))
        {
          \File::delete(public_path('admin-css/uploads/images/brands/'.$old_image));
        } 
        //delete brand data
        $brand->delete();
        //redirect
        return redirect()->back();
    }
}
