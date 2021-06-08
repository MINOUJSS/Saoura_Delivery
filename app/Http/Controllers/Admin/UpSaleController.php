<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\up_sale;
use App\admin_notefication;
use App\reading_notification;
use Auth;


class UpSaleController extends Controller
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
        $upsales=up_sale::orderBy('id','desc')->paginate(10);
        return view('admin.inc.up_sales.index',compact('upsales'));
    }

    public function create()
    {
        return view('admin.inc.up_sales.create');
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'first_product_id'=>'required|exists:products,id',
            'second_product_id'=>'required|exists:products,id',
        ]);
        //save data
        $upsale=new up_sale;
        $upsale->first_product_id=$request->first_product_id;
        $upsale->second_product_id=$request->second_product_id;
        $upsale->type=$request->type;
        $upsale->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة علاقة بين المنتج رقم '.$request->first_product_id.' و المنتج رقم '.$request->second_product_id;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.upsales');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success
        Alert::success('رائع','تم إنشاء العلاقة بين المنتجين بنجاح');
        //redirect
        return redirect()->back();
    }

    public function edit($id)
    {
        $upsale=up_sale::findOrFail($id);
        return view('admin.inc.up_sales.edit',compact('upsale'));
    }

    public function update(Request $request)
    {
        //validation
        $this->validate($request,[
            'first_product_id'=>'required|exists:products,id',
            'second_product_id'=>'required|exists:products,id',
        ]);
        //update
        $upsale=up_sale::findOrFail($request->upsale_id);
        $upsale->first_product_id=$request->first_product_id;
        $upsale->second_product_id=$request->second_product_id;
        $upsale->type=$request->type;
        $upsale->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل العلاقة بين المنتج رقم '.$request->first_product_id.' و المنتج رقم '.$request->second_product_id;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.upsales');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success
        Alert::success('رائع','تم تعديل العلاقة بين المنتجين بنجاح');
        //redirect
        return redirect()->back();
    }

    public function destroy($id)
    {
        $upsale=up_sale::findOrFail($id);
        $upsale->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف العلاقة بين المنتج رقم '.$upsale->first_product_id.' و المنتج رقم '.$upsale->second_product_id;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.upsales');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();        
    }
}
