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

class CategoryController extends Controller
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
        $categories=category::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        $sub_categories=Sub_Category::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        $sub_sub_categories=Sub_Sub_Category::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        return view('admin.categories',compact('categories','sub_categories','sub_sub_categories'));
    }

    public function create()
    {
        $categories=Category::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        return view('admin.create-category',compact('categories'));
    }
    public function edite($id)
    {
        $categories=Category::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        $category=Category::findOrFail($id);
        return view('admin.edit-category',compact('categories','category'));
    }
    public function update(Request $request)
    {
        //validate data
        $this->validate($request,[
            'category' =>'required|min:3',
            'image' =>'mimes:jpeg,bmp,png'
        ]);
        //save data
        $category=Category::findOrFail($request->input('category_id'));
        //upload image
        if($file=$request->file('image'))
        {
            //delete old image from categories folder
            $old_image=$category->image;
            if(\File::exists(public_path('admin-css/uploads/images/categories/'.$old_image)))
           {
            \File::delete(public_path('admin-css/uploads/images/categories/'.$old_image));
           }
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/categories',$imagename))
            {
                //insert into database;
                $category->image=$imagename;
            }
        }                    
        $category->name=$request->input('category');
        $category->slug=make_slug($request->input('category'));
        $category->icon="/";
        $category->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل الصنف '.$category->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.categories');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('تعديل صنف', 'تم تعديل الصنف بنجاح');

        //redirecte to category page
        return redirect()->back();
    }
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'category' =>'required|min:3',
            'image' =>'required|mimes:jpeg,bmp,png'
        ]);
        //save data
        $category=new Category;
        //upload image
        if($file=$request->file('image'))
        {
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/categories',$imagename))
            {
                //insert into database;
                $category->image=$imagename;
            }
        }                    
        $category->name=$request->input('category');
        $category->slug=make_slug($request->input('category'));
        $category->icon="/";
        $category->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة الصنف '.$category->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.categories');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('إضافة صنف', 'تم إضافة الصنف بنجاح');

        //redirecte to category page
        return redirect(route('admin.create.categories'));
    }
    public function destroy($id)
    {        
        $category=Category::findOrfail($id); 
        $category_name=$category->name;
        //delete the image uploaded from categories folder
           if(\File::exists(public_path('admin-css/uploads/images/categories/'.$category->image)))
           {
            \File::delete(public_path('admin-css/uploads/images/categories/'.$category->image));
           }             
        if(has_sub_category($id))
        {
            $sub_categories=Sub_Category::where('category_id',$id)->get();
            //if true test if has sub sub category
            foreach($sub_categories as $sub_category)
            {
                if(has_sub_sub_category($sub_category->id))
                {
                    $sub_sub_categorys=Sub_Sub_Category::where('sub_category_id',$sub_category->id)->get();
                    foreach($sub_sub_categorys as $sub_sub_category)
                    {
                        $sub_sub_category->delete();
                        // return redirect()->back();
                    }                    
                }else
                {
                    $sub_category->delete();
                    // return redirect()->back();
                }
                //delete sub_category
                $sub_category->delete();
                //delete category
                $category->delete();
            }
        }else
        {
            $category->delete();
            // return redirect()->back();
        }
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف الصنف '.$category_name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.categories');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();

        return redirect(url('/admin/categories#category'));
    }
}
