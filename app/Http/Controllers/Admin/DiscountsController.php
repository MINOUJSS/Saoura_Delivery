<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\discount;
use App\product;

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
        //alert success 
        //Alert::success('حذف تخفيض','تم حذف التخفيض بنجاح');
        //redirect
        //return redirect()->back();
    }
}
