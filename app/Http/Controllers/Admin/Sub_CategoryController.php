<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\Sub_Category;
use App\Sub_Sub_Category;
use RealRashid\SweetAlert\Facades\Alert;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class Sub_CategoryController extends Controller
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
        $sub_categories=Sub_Category::OrderBy('id','desc')->paginate(10);
        return view('admin.Sub_Categories',compact('sub_categories'));
    }

    public function create()
    {
        $categories=category::orderBy('id','desc')->where('id','!=','1')->get();
        $sub_categories=Sub_Category::OrderBy('id','desc')->where('id','!=','1')->paginate(10);
        return view('admin.create-sub-category',compact('categories','sub_categories'));
    }

    public function edite($id)
    {
        $categories=category::orderBy('id','desc')->where('id','!=','1')->get();
        $sub_categories=Sub_Category::OrderBy('id','desc')->where('id','!=','1')->paginate(10);
        $sub_category=Sub_Category::findOrFail($id);
        return view('admin.edit-sub-category',compact('categories','sub_categories','sub_category'));
    }

    public function update(Request $request)
    {
        //validate data
        $this->validate($request,[
            'category' =>'required',
            'sub_category' =>'required|min:3'
        ]);
        //save data 
        if($request->input('category')==0)
                {
                    Alert::error('إضافة تحت الصنف', 'فشل حفظ تحت الصنف بسبب عدم إختيار الصنف الذي ينتمي إليه');
                    //return back with data
                    return redirect()->back();
                }else{              
        $sub_category=Sub_Category::findOrFail($request->input('sub_category_id'));
        $sub_category->category_id=$request->input('category');
        $sub_category->name=$request->input('sub_category');
        $sub_category->slug=make_slug($request->input('sub_category'));
        $sub_category->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل تحت الصنف '.$sub_category->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.categories');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //success alert
        Alert::success('تعديل تحت الصنف', 'تم تعديل تحت الصنف بنجاح');
        return redirect()->back();
                }
    }

    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'category' =>'required',
            'sub_category' =>'required|min:3'
        ]);
        //save data 
        if($request->input('category')==0)
                {
                    Alert::error('إضافة تحت الصنف', 'فشل حفظ تحت الصنف بسبب عدم إختيار الصنف الذي ينتمي إليه');
                    //return back with data
                    return redirect()->back();
                }else{              
        $sub_category=new Sub_Category;
        $sub_category->category_id=$request->input('category');
        $sub_category->name=$request->input('sub_category');
        $sub_category->slug=make_slug($request->input('sub_category'));
        $sub_category->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة تحت الصنف '.$sub_category->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.categories');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //success alert
        Alert::success('إضافة تحت الصنف', 'تم إضافة تحت الصنف بنجاح');
        return redirect(route('admin.create.sub_categories'));
                }
    }
    public function destroy($id)
    {
        $sub_category=Sub_Category::find($id);
        $sub_category_name=$sub_category->name;
        if(has_sub_sub_category($sub_category->id))
                {
                    $sub_sub_categorys=Sub_Sub_Category::where('sub_category_id',$sub_category->id)->get();
                    foreach($sub_sub_categorys as $sub_sub_category)
                    {
                        $sub_sub_category->delete();
                        // return redirect()->back();
                    }
                    $sub_category->delete();                   
                }else
                {
                    $sub_category->delete();
                    // return redirect()->back();
                }
                //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف تحت الصنف '.$sub_category_name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.categories');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //redirect
                return redirect(url('/admin/categories#sub_category'));
    }

    public function get_sub_categories_from_category_id($category_id)
    {
        $html="<option value='0'>إختر تحت الصنف</option>";
        if($category_id==0)
        {
            return json_encode($html);
        }
        $sub_categories=Sub_Category::where('category_id',$category_id)->get();                
        
        if($sub_categories->count() > 0)
        {
            foreach($sub_categories as $sub_cat)
            {
                if(old('product_sub_category')==$sub_cat->name)
                {
                    $selected=" selected";
                }else
                {
                    $selected=" ";
                }

                $html.='<option value="'.$sub_cat->id.'"'.$selected.'>'.$sub_cat->name.'</option>';
            }        
        
        }
            return json_encode($html);  
    }
}
