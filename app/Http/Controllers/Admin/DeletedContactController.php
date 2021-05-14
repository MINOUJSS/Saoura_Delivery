<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\deleted_contact;
use App\deleted_reply;
use App\contact_us;
use App\reply_contact;

class DeletedContactController extends Controller
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
        $contacts=deleted_contact::orderBy('id','desc')->paginate(2);
        return view('admin.inc.contact.deleted-contacts',compact('contacts'));
    }
    public function destroy($id)
    {
        $deleted_contact=deleted_contact::findOrFail($id);
        //delete
        $deleted_contact->delete();
        //success alert 
        Alert::success('رائع','تم حذف الرسالة');
        //redirect
        return redirect()->back();
    }

    public function recovery($id)
    {
        $deleted_contact=deleted_contact::findOrFail($id);        
        //insert in contact us table
        $contact=new contact_us;
        $contact->consumer_id=$deleted_contact->consumer_id;
        $contact->name=$deleted_contact->name;
        $contact->email=$deleted_contact->email;
        $contact->title=$deleted_contact->title;
        $contact->message=$deleted_contact->message;
        $contact->image=$deleted_contact->image;
        $contact->status=$deleted_contact->status;
        $contact->save();
        //if has deleted reply
        if(has_deleted_reply($id))
        {
            $deleted_reply=deleted_reply::where('contact_us_id',$id)->first();
            //insert in reply table
            $reply=new reply_contact;
            $reply->admin_id=$deleted_reply->admin_id;
            $reply->contact_us_id=$contact->id;
            $reply->to=$deleted_reply->to;        
            $reply->subject=$deleted_reply->subject;
            $reply->message=$deleted_reply->message;
            $reply->created_at=$deleted_reply->created_at;
            $reply->updated_at=$deleted_reply->updated_at;
            $reply->save();
        }
        //deleted from deleted contact table
        $deleted_contact->delete();
        //alert success
        Alert::success('رائع','تم إسترجاع الرسالة');
        //redirect
        return redirect()->back();
    }
}
