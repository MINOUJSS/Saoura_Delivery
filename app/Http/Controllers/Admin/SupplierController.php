<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\supplier;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class SupplierController extends Controller
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
        $suppliers=supplier::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        return view('admin.suppliers',compact('suppliers'));
    }
    public function create()
    {
        return view('admin.create-supplier');
    }

    public function store(Request $request)
    {
         //validate data
         $this->validate($request,[
            'supplier_name' =>'required|min:3',
            'supplier_email' =>'sometimes|email',
            'supplier_mobile' =>'required|numeric',
            'supplier_address' =>'required'
        ]);
        //save data
        $supplier=new supplier;
        $supplier->name=$request->input('supplier_name');        
        $supplier->email=$request->input('supplier_email');
        $supplier->mobile=$request->input('supplier_mobile');        
        $supplier->address=$request->input('supplier_address');
        $supplier->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة المورّد '.$supplier->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.suppliers');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('رائع', 'تم إضافة المورد بنجاح');
        //redirecte to category page
        return redirect()->back();
    }

    public function edit($id)
    {
        $supplier=supplier::findOrFail($id);
        return view('admin.edit-supplier',compact('supplier'));
    }

    public function update(Request $request)
    {
        //validate data
        $this->validate($request,[
            'supplier_name' =>'required|min:3',
            'supplier_email' =>'email',
            'supplier_mobile' =>'required|numeric',
            'supplier_address' =>'required'
        ]);
        //save data
        $supplier=supplier::findOrFail($request->input('supplier_id'));
        $supplier->name=$request->input('supplier_name');        
        $supplier->email=$request->input('supplier_email');
        $supplier->mobile=$request->input('supplier_mobile');        
        $supplier->address=$request->input('supplier_address');
        $supplier->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل معلومات المورّد '.$supplier->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.suppliers');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('رائع', 'تم تعديل المورد بنجاح');

        //redirecte to category page
        return redirect()->back();
    }

    public function destroy($id)
    {
        $supplier=supplier::findOrFail($id);
        $supplier_name=$supplier->name;
        //delete supplier data
        $supplier->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف المورّد '.$supplier_name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.suppliers');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
    }
}
