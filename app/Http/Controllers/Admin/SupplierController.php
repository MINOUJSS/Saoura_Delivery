<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\supplier;

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
            'supplier_email' =>'email',
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
        //alert success message
        Alert::success('إضافة مورد', 'تم إضافة المورد بنجاح');

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
        //alert success message
        Alert::success('تعديل مورد', 'تم تعديل المورد بنجاح');

        //redirecte to category page
        return redirect()->back();
    }

    public function destroy($id)
    {
        $supplier=supplier::findOrFail($id);
        //delete supplier data
        $supplier->delete();
    }
}
