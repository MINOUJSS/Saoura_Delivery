<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\deal;
use App\sid_deal;
use App\admin_noteficiation;
use App\reading_notification;
use Auth;

class DealController extends Controller
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
        $deals=deal::orderBy('id','desc')->get();
        return view('admin.deals',compact('deals'));
    }

    public function create_slider()
    {
        return view('admin.add-deal');
    }
    public function destroy_slider($id)
    {
        $deal=deal::findOrfail($id);
    //delete the image uploaded from deals folder
    if(\File::exists(public_path('admin-css/uploads/images/deals/'.$deal->image)))
    {
     \File::delete(public_path('admin-css/uploads/images/deals/'.$deal->image));
    }
        //delete data
        $deal->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف السلايدر '.$deal->title;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.slider.deals');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();        
        //redurect 
        return redirect()->back();
    }
    public function edit_slider($id)
    {
        $deal=deal::findOrfail($id);    
        return view('admin.edit-deal',compact('deal'));
    }
    public function update_slider(Request $request)
    {
        //validate data
        $this->validate($request,[
            'product_id' =>'required|numeric',
            'title'=>'required|min:6',
            'daitels'=>'required|min:50',
            // 'descount'=>'required|numeric',
            'link'=>'required|url',
            'image' =>'mimes:jpeg,bmp,png'
        ]);
        //save data
        $deal=deal::findOrFail($request->input('deal_id'));
        //upload image
        if($file=$request->file('image'))
        {
            //delete old image from deals folder
            $old_image=$deal->image;
            if(\File::exists(public_path('admin-css/uploads/images/deals/'.$old_image)))
           {
            \File::delete(public_path('admin-css/uploads/images/deals/'.$old_image));
           }
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/deals',$imagename))
            {
                //insert into database;
                $deal->image=$imagename;
            }
        }                    
        $deal->user_id=$request->input('user_id');
        $deal->product_id=$request->input('product_id');
        $deal->title=$request->input('title');
        $deal->daitels=$request->input('daitels');
        // $deal->descount=$request->input('descount');
        $deal->link=$request->input('link');
        $deal->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل السلايدر '.$deal->title;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.slider.deals');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();        
        //alert success message
        Alert::success('تعديل عرض خاص', 'تم تعديل العرض بنجاح');

        //redirecte to category page
        return redirect()->back();

    }
    public function store_slider(Request $request)
    {
                // validate data
                $this->validate($request,[
                    'product_id' =>'required|numeric',
                    'title'=>'required|min:6',
                    'daitels'=>'required|min:50',
                    // 'descount'=>'required|numeric',
                    'link'=>'required|url',
                    'image' =>'required|mimes:jpeg,bmp,png'
                ]); 
                // save data
                $deal=new deal;
                $deal->user_id=$request->input('user_id');
                $deal->product_id=$request->input('product_id');
                $deal->title=$request->input('title');
                $deal->daitels=$request->input('daitels');
                // $deal->descount=$request->input('descount');
                $deal->link=$request->input('link');
                //upload image
                if($file=$request->file('image'))
        {
            
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/deals',$imagename))
            {
                //insert into database;
                $deal->image=$imagename;
            }
        }   
        $deal->save();                 
                //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة السلايدر '.$deal->title;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.slider.deals');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();        
                // success alert 
                Alert::success('إضافة عرض خاص', 'تم إضافة العرض بنجاح');
                //redirect to deals pege
                return redirect()->back();

    }
    //sid deal function
    public function sid_deal_index()
    {
        $deals=sid_deal::orderBy('id','desc')->get();
        return view('admin.sid-deals',compact('deals'));
    }
    public function create_sid_deal()
    {        
        return view('admin.add-sid-deal');
    }
    public function store_sid_deal(Request $request)
    {
        // validate data
        $this->validate($request,[
            'product_id' =>'required|numeric',
            'title'=>'required|min:6',            
            'link'=>'required|url',
            'exp_date'=>'required',
            'image' =>'required|mimes:jpeg,bmp,png'
        ]); 
        // save data
        $deal=new sid_deal;
        $deal->user_id=$request->input('user_id');
        $deal->product_id=$request->input('product_id');
        $deal->title=$request->input('title');
        $deal->exp_date=$request->input('exp_date').' '.date('H:i:s');
        $deal->link=$request->input('link');
        //upload image
        if($file=$request->file('image'))
{
    
    $extention=$request->file('image')->getClientOriginalExtension();
    $imagename=time().'.'.$extention;
    if($file->move('admin-css/uploads/images/deals',$imagename))
    {
        //insert into database;
        $deal->image=$imagename;
    }
}   
$deal->save();                 
//noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة السلايدر '.$deal->title;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.sid.deals');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        // success alert 
        Alert::success('إضافة عرض خاص', 'تم إضافة العرض جانبي بنجاح');
        //redirect to deals pege
        return redirect()->back();

    }
    public function edit_sid_deal($id)
    {
        $deal=sid_deal::findOrfail($id);
        return view('admin.edit-sid-deal',compact('deal'));
    }
    public function update_sid_deal(Request $request)
    {
        //validate data
        $this->validate($request,[
            'product_id' =>'required|numeric',
            'title'=>'required|min:6',            
            'link'=>'required|url',
            'exp_date'=>'required',
            'image' =>'mimes:jpeg,bmp,png'
        ]);
        //save data
        $deal=sid_deal::findOrFail($request->input('deal_id'));
        //upload image
        if($file=$request->file('image'))
        {
            //delete old image from deals folder
            $old_image=$deal->image;
            if(\File::exists(public_path('admin-css/uploads/images/deals/'.$old_image)))
           {
            \File::delete(public_path('admin-css/uploads/images/deals/'.$old_image));
           }
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/deals',$imagename))
            {
                //insert into database;
                $deal->image=$imagename;
            }
        }                    
        $deal->user_id=$request->input('user_id');
        $deal->product_id=$request->input('product_id');
        $deal->title=$request->input('title');        
        $deal->link=$request->input('link');
        $deal->exp_date=$request->input('exp_date').' '.date('H:i:s');
        $deal->update();
        //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل السلايدر '.$deal->title;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.sid.deals');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        

        //alert success message
        Alert::success('تعديل عرض خاص', 'تم تعديل العرض الجانبي بنجاح');

        //redirecte to category page
        return redirect()->back();
    }
    public function destroy_sid_deal($id)
    {
        $deal=sid_deal::findOrfail($id);
    //delete the image uploaded from deals folder
    if(\File::exists(public_path('admin-css/uploads/images/deals/'.$deal->image)))
    {
     \File::delete(public_path('admin-css/uploads/images/deals/'.$deal->image));
    }
        //delete data
        $deal->delete();
                //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف السلايدر '.$deal->title;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.sid.deals');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        //redurect 
        return redirect()->back();
    }
}
