<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\admin_notefication;
use App\reading_notification;
use App\about_us;
use App\contra;
use App\how_to_ship;
use Auth;
class PagesController extends Controller
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

    public function about_us()
    {
        $about_us=about_us::first();
        return view('admin.about_us',compact('about_us'));
    }

    public function about_us_update(Request $request)
    {
        //validate
        $this->validate($request,[
            'editor' =>'required|min:10'
        ]);
        //update data
        $about_us=about_us::find($request->about_id);
        $about_us->content=$request->editor;
        $about_us->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل صفحة من نحن';
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.about_us');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success
        Alert::success('رائع','تم تعديل صفحة من نحن بنجاح');
        //redirect
        return redirect()->back();
    }

    public function contra()
    {
        $contra=contra::first();
        return view('admin.contra',compact('contra'));
    }

    public function contra_update(Request $request)
    {
        //validate
        $this->validate($request,[
            'editor' =>'required|min:10'
        ]);
        //update data
        $contra=contra::find($request->contra_id);
        $contra->content=$request->editor;
        $contra->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل صفحة سياسة خصوصية';
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.contra');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success
        Alert::success('رائع','تم تعديل صفحة سياسة خصوصية  بنجاح');
        //redirect
        return redirect()->back();
    }
    public function how_to_ship()
    {
        $h_t_ship=how_to_ship::first();
        return view('admin.how_to_ship',compact('h_t_ship'));
    }

    public function how_to_ship_update(Request $request)
    {
        //validate
        $this->validate($request,[
            'editor' =>'required|min:10'
        ]);
        //update data
        $h_t_ship=how_to_ship::find($request->h_t_ship_id);
        $h_t_ship->content=$request->editor;
        $h_t_ship->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل صفحة طريقة تسليم الطلبات';
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.how_to_ship');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success
        Alert::success('رائع','تم تعديل صفحة طريقة تسليم الطلبات  بنجاح');
        //redirect
        return redirect()->back();
    }

}
