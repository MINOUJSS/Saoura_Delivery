<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\discount;
use App\product;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class DiscountsController extends Controller
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
        $discounts=discount::orderBy('id','desc')->paginate(10);
        return view('admin.discounts',compact('discounts'));
    }

    public function create($product_id)
    {
        $product=product::findOrFail($product_id);
        return view('admin.create-discount',compact('product'));
    }
    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
            'discount' =>'required|numeric',
            'exp_date' => 'required'
        ]);
        //save data
        $discount=new discount;
        $discount->product_id=$request->product_id;
        $discount->discount=$request->discount;
        $discount->exp_date=$request->exp_date.' '.date('H:i:s');
        $discount->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة تخفيض للمنتج رقم '.$discount->product_id;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //Alert success message        
        Alert::success('إضافة تخفيض', 'تم إضافة التخفيض بنجاح');
        //redirect back();
        return redirect()->back();
    }
    public function destroy($id)
    {
        $discount=discount::findOrFail($id);
        //delete
        $discount->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف التخفيض للمنتج رقم '.$discount->product_id;
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

    public function edit($id)
    {
        $discount=discount::findOrFail($id);
        $product=product::findOrfail($discount->product_id);
        return view('admin.edit-discount',compact('product','discount'));
    }

    public function update(Request $request)
    {
        //validate
        $this->validate($request,[
            'discount' =>'required|numeric',
            'exp_date' => 'required'
        ]);
        //save data
        $discount=discount::where('product_id',$request->product_id)->first();
        $discount->discount=$request->discount;
        $discount->exp_date=$request->exp_date.' '.date('H:i:s');
        $discount->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل التخفيض للمنتج رقم '.$discount->product_id;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //Alert success message        
        Alert::success('رائع', 'تم تعديل التخفيض بنجاح');
        //redirect back();
        return redirect()->back();
    }
}
