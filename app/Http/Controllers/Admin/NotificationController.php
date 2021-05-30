<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class NotificationController extends Controller
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
        $notes=admin_notefication::orderBy('id','desc')->paginate(10);
        return view('admin.inc.admin-notification.index',compact('notes')); 
    }
    public function read_note_and_redirect($id)
    {
        //get note data
        $note=admin_notefication::findOrFail($id);
        //insert to the reading note table
        $is_ex_rnote=reading_notification::where('admin_id',Auth::guard('admin')->user()->id)->where('note_id',$id)->first();
        if($is_ex_rnote == null){
        $r_note= new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$id;
        $r_note->save();
        }
        //redirect
        return redirect(url($note->link));
    }
}
