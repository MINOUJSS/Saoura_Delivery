<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sub_category;
use App\Sub_Sub_Category;
use RealRashid\SweetAlert\Facades\Alert;

class Sub_Sub_CategoryController extends Controller
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

    public function create()
    {
        $sub_categories=Sub_Category::all();
        $sub_sub_categories=Sub_Sub_Category::OrderBy('id','desc')->paginate(10);
        return view('admin.create-sub-sub-category',compact('sub_categories','sub_sub_categories'));
    }

    public function edite($id)
    {
        $sub_categories=Sub_Category::all();
        $sub_sub_categories=Sub_Sub_Category::OrderBy('id','desc')->paginate(10);
        $sub_sub_category=Sub_Sub_Category::findOrFail($id);
        return view('admin.edit-sub-sub-category',compact('sub_categories','sub_sub_categories','sub_sub_category'));
    }

    public function update(Request $request)
    {
        //validate data
        $data=$this->validate($request,[
            'sub_category' =>'required',
            'sub_sub_category' =>'required|min:3'
        ]);
        //save data 
        if($request->input('sub_category')==0)
        {
            Alert::error('إضافة تحت تحت الصنف', 'فشل حفظ تحت تحت الصنف بسبب عدم إختيار تحت الصنف الذي ينتمي إليه');
            //return back with data
            return redirect()->back();
        }else{       
        $sub_sub_category=Sub_Sub_category::findOrFail($request->input('sub_sub_category_id'));
        $sub_sub_category->sub_category_id=$request->input('sub_category');
        $sub_sub_category->name=$request->input('sub_sub_category');
        $sub_sub_category->update();
        Alert::success('تعديل تحت تحت الصنف', 'تم تعديل تحت تحت الصنف بنجاح');
        return redirect()->back();
        }
    }

    public function store(Request $request)
    {
                //validate data
                $data=$this->validate($request,[
                    'sub_category' =>'required',
                    'sub_sub_category' =>'required|min:3'
                ]);
                //save data 
                if($request->input('sub_category')==0)
                {
                    Alert::error('إضافة تحت تحت الصنف', 'فشل حفظ تحت تحت الصنف بسبب عدم إختيار تحت الصنف الذي ينتمي إليه');
                    //return back with data
                    return redirect()->back();
                }else{       
                $sub_sub_category=new Sub_Sub_category;
                $sub_sub_category->sub_category_id=$request->input('sub_category');
                $sub_sub_category->name=$request->input('sub_sub_category');
                $sub_sub_category->save();
                Alert::success('إضافة تحت تحت الصنف', 'تم إضافة تحت تحت الصنف بنجاح');
                return redirect(route('admin.create.sub_sub_categories'));
                }
    }

    public function destroy($id)
    {
        $sub_sub_category=Sub_Sub_Category::find($id);
        $sub_sub_category->delete();
        return redirect(url('/admin/categories#sub_sub_category'));
    }

    public function get_sub_sub_categories_from_category_id($sub_category_id)
    {
        $html="<option value='0'>إختر تحت تحت الصنف</option>";
        if($sub_category_id==0)
        {
            return json_encode($html);
        }
        $sub_sub_categories=Sub_Sub_Category::where('sub_category_id',$sub_category_id)->get();                
        
        if($sub_sub_categories->count() > 0)
        {
            foreach($sub_sub_categories as $sub_sub_cat)
            {
                if(old('product_sub_sub_category')==$sub_sub_cat->name)
                {
                    $selected=" selected";
                }else
                {
                    $selected=" ";
                }

                $html.= '<option value="'.$sub_sub_cat->id.'"'.$selected.'>'.$sub_sub_cat->name.'</option>';
            }        
        
        }
            return json_encode($html);  
    }

}
