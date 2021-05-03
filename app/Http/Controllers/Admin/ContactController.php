<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\contact_us;
use App\deleted_contact;
use App\draft_contact;

class ContactController extends Controller
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
        $contacts=contact_us::orderBy('id','desc')->paginate(2);
        return view('admin.inc.contact.contacts',compact('contacts'));
    }

    public function create()
    {
        return view('admin.inc.contact.create-mail');
    }
    public function store(Request $request)
    {
        //validate data

        //send mail

        //insert in sent mail table

        //success alert

        //redirect
        return 'this is contact store';
    }
    public function show($id)
    {
        $contact=contact_us::findOrFail($id);
        //update status
        if($contact->status==0){
        $contact->status=1;
        $contact->update();
        }
        return view('admin.inc.contact.show-contact',compact('contact'));
    }
    public function create_reply($id)    
    {
        $contact=contact_us::findOrFail($id);
        //update status
        if($contact->status==0){
        $contact->status=1;
        $contact->update();
        }
        return view('admin.inc.contact.reply-contact',compact('contact'));
    }
    public function store_reply(Request $request)
    {
        //validate data

        //send mail

        //insert in sent mail table

        //success alert

        //redirect
        return 'this is reply store';
    }
    public function destroy($id)
    {
        $contact=contact_us::findOrfail($id);
        //insert date in deleted contact table
        $delete_contact= new deleted_contact;
        $delete_contact->consumer_id=$contact->consumer_id;
        $delete_contact->name=$contact->name;
        $delete_contact->email=$contact->email;
        $delete_contact->title=$contact->title;
        $delete_contact->message=$contact->message;
        $delete_contact->image=$contact->image;
        $delete_contact->status=$contact->status;
        $delete_contact->save();
        //delete contact
        $contact->delete();
        //success alert
        Alert::success('رائع','تم حذف الرسالة');
        //redirect to contacts
        return redirect(route('admin.all.contacts'));
    }
    public function draft_contact(Request $request)
    {

    }
}
