<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\size;

class SizeController extends Controller
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
        $sizes=size::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        return view('admin.sizes',compact('sizes'));
    }
    public function create()
    {
        return view('admin.create-size');
    }

    public function store(Request $request)
    {
        //validattion
        $this->validate($request,[
            'size_name' => 'required|min:3',
            'size_size' => 'required'
        ]);
        //save data
        $size= new size;            
        $size->user_id=$request->input('size_user_id');                           
        $size->name=$request->input('size_name');
        $size->size=$request->input('size_size');
        $size->save();
        //alert success message
        Alert::success('إضافة مقاس', 'تم إضافة مقاس بنجاح');

        //redirecte to category page
        return redirect()->back();
    }

    public function edit($id)
    {
        if($id==1)
        {
            redirect()->back();
        }else{
        $size=size::findOrFail($id);
        return view('admin.edit-size',compact('size'));
        }
    }

    public function update(Request $request)
    {
                //validattion
                $this->validate($request,[
                    'size_name' => 'required|min:3',
                    'size_size' => 'required'
                ]);
                //update data
                $size=size::findOrFail($request->input('size_size_id'));
                $size->user_id=$request->input('size_user_id');                           
                $size->name=$request->input('size_name');
                $size->size=$request->input('size_size');
                $size->update();
                //alert success message
                Alert::success('تعديل مقاس', 'تم تعديل مقاس بنجاح');
        
                //redirecte to category page
                return redirect()->back();
    }

    public function destroy($id)
    {
        if($id==1)
        {
            return redirect()->back();
        }else
        {
            $size=size::findOrFail($id);
            $size->delete();
            //
            return redirect()->back();
        }
    }
}
