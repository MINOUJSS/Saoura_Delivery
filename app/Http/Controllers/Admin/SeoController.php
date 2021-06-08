<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\product;
use App\Product_seo;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class SeoController extends Controller
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
    public function products_seo_index()
    {
        $seos=Product_seo::orderBy('id','desc')->paginate(10);
      return view('admin.inc.products.seo.index',compact('seos'));  
    }

    public function product_seo_create($id)
    {
        $product=product::findOrfail($id);
        return view('admin.inc.products.seo.create',compact('product'));
    }

    public function product_seo_store(Request $request)
    {
        //validate
        $this->validate($request,[
            'keywords'=>'required',
            'description'=>'required',
            'link'=>'required'
        ]);
        //save data
        $seo=new Product_seo;
        $seo->product_id=$request->product_id;
        $seo->key_words=$request->keywords;
        $seo->description=$request->description;
        $seo->link=$request->link;
        $seo->save();
           //noteficte admin
           $note=new admin_notefication;
           $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة الكلمات المفتاحية للمنتج رقم '.$request->product_id;
           $note->icon ='fa fa-info-circle';
           $note->type=1;
           $note->link=route('admin.products');
           $note->save();
           //insert reading note for this admin
           $r_note=new reading_notification;
           $r_note->admin_id=Auth::guard('admin')->user()->id;
           $r_note->note_id=$note->id;
           $r_note->save();
        //success alert
        Alert::success('رائع','تم إضافة الكلمات المفتاحية للمنتج');
        //redirect
        return redirect(route('admin.products.seo'));
    }

    public function product_seo_edit($id)
    {
        $seo=Product_seo::where('product_id',$id)->first();
        return view('admin.inc.products.seo.edit',compact('seo'));  
    }

    public function product_seo_update(Request $request)
    {
        //validate
        $this->validate($request,[
            'keywords'=>'required',
            'description'=>'required',
            'link'=>'required'
        ]);
        //save data
        $seo=Product_seo::findOrFail($request->seo_id);
        $seo->key_words=$request->keywords;
        $seo->description=$request->description;
        $seo->link=$request->link;
        $seo->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل الكلمات المفتاحية للمنتج رقم '.$seo->product_id;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //success alert
        Alert::success('رائع','تم تعديل الكلمات المفتاحية للمنتج');
        //redirect
        return redirect(route('admin.products.seo'));
    }

    public function Product_seo_destroy($id)
    {
        $seo=Product_seo::findOrFail($id);
        //delete
        $seo->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف الكلمات المفتاحية للمنتج رقم '.$seo->product_id;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
    }
}
