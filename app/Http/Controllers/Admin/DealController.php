<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\deal;

class DealController extends Controller
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
        $deals=deal::orderBy('id','desc')->get();
        return view('admin.deals',compact('deals'));
    }

    public function create()
    {
        return view('admin.add-deal');
    }
    public function destroy($id)
    {
        $deal=deal::findOrfail($id);
    //delete the image uploaded from deals folder
    if(\File::exists(public_path('admin-css/uploads/images/deals/'.$deal->image)))
    {
     \File::delete(public_path('admin-css/uploads/images/deals/'.$deal->image));
    }
        //delete data
        $deal->delete();
        //redurect 
        return redirect()->back();
    }
    public function edit($id)
    {
        $deal=deal::findOrfail($id);    
        return view('admin.edit-deal',compact('deal'));
    }
    public function update(Request $request)
    {
        //validate data
        $this->validate($request,[
            'product_id' =>'required|numeric',
            'title'=>'required|min:6',
            'daitels'=>'required|min:50',
            'descount'=>'required|numeric',
            'link'=>'required|url',
            'image' =>'mimes:jpeg,bmp,png'
        ]);
        //save data
        $deal=deal::findOrFail($request->input('deal_id'));
        //upload image
        if($file=$request->file('image'))
        {
            //delete old image from deals folder
            $old_image=$deal->image;
            if(\File::exists(public_path('admin-css/uploads/images/deals/'.$old_image)))
           {
            \File::delete(public_path('admin-css/uploads/images/deals/'.$old_image));
           }
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/deals',$imagename))
            {
                //insert into database;
                $deal->image=$imagename;
            }
        }                    
        $deal->user_id=$request->input('user_id');
        $deal->product_id=$request->input('product_id');
        $deal->title=$request->input('title');
        $deal->daitels=$request->input('daitels');
        $deal->descount=$request->input('descount');
        $deal->link=$request->input('link');
        $deal->update();
        //alert success message
        Alert::success('تعديل عرض خاص', 'تم تعديل العرض بنجاح');

        //redirecte to category page
        return redirect()->back();

    }
    public function store(Request $request)
    {
                // validate data
                $this->validate($request,[
                    'product_id' =>'required|numeric',
                    'title'=>'required|min:6',
                    'daitels'=>'required|min:50',
                    'descount'=>'required|numeric',
                    'link'=>'required|url',
                    'image' =>'required|mimes:jpeg,bmp,png'
                ]); 
                // save data
                $deal=new deal;
                $deal->user_id=$request->input('user_id');
                $deal->product_id=$request->input('product_id');
                $deal->title=$request->input('title');
                $deal->daitels=$request->input('daitels');
                $deal->descount=$request->input('descount');
                $deal->link=$request->input('link');
                //upload image
                if($file=$request->file('image'))
        {
            
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/deals',$imagename))
            {
                //insert into database;
                $deal->image=$imagename;
            }
        }   
        $deal->save();                 
                // success alert 
                Alert::success('إضافة عرض خاص', 'تم إضافة العرض بنجاح');
                //redirect to deals pege
                return redirect()->back();

    }
}
