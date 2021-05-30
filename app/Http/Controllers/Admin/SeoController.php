<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\product;
use App\product_seo;

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
        $seos=product_seo::orderBy('id','desc')->paginate(10);
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
        $seo=new product_seo;
        $seo->product_id=$request->product_id;
        $seo->key_words=$request->keywords;
        $seo->description=$request->description;
        $seo->link=$request->link;
        $seo->save();
        //success alert
        Alert::success('رائع','تم إضافة الكلمات المفتاحية للمنتج');
        //redirect
        return redirect(route('admin.products.seo'));
    }

    public function product_seo_edit($id)
    {
        $seo=product_seo::findOrFail($id);
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
        $seo=product_seo::findOrFail($request->seo_id);
        $seo->key_words=$request->keywords;
        $seo->description=$request->description;
        $seo->link=$request->link;
        $seo->update();
        //success alert
        Alert::success('رائع','تم تعديل الكلمات المفتاحية للمنتج');
        //redirect
        return redirect(route('admin.products.seo'));
    }

    public function product_seo_destroy($id)
    {
        $seo=product_seo::findOrFail($id);
        //delete
        $seo->delete();
    }
}
