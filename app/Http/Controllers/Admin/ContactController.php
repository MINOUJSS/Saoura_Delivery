<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\contact_us_reply;
//use Illuminate\Contracts\Queue\ShoulQueue;
use App\Jobs\Send_Contact_Mail;
use App\contact_us;
use App\deleted_contact;
use App\deleted_reply;
use App\reply_contact;
use Auth;

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
        $contacts=contact_us::orderBy('id','desc')->paginate(10);
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
        //dd($request);
        //validate data
        $this->validate($request,[
            'to'=>'required|email',
            'subject'=>'required|min:6',
            'message'=>'required'
        ]);
        $data=array(
            'to'=>$request->to,
            'subject'=>$request->subject,
            'message'=>$request->message
        );
        $data=array(
            'to' => $request->to,
            'name'   =>$request->name,
            'subject'=> $request->subject,
            'message' => $request->message
        );
        //send mail
            Mail::to($request->to)->send(new Send_Contact_mail($data));
            for($i=0;$i<=10;$i++)
            {

                //dispatch(new Send_Contact_mail($data));
                Send_Contact_mail::dispatch($data);
            }            
        //insert in sent mail table
            $email=new reply_contact;
            $email->admin_id=Auth::guard('admin')->user()->id;
            $email->contact_us_id=$request->contact_us_id;
            $email->to=$request->to;
            $email->subject=$request->subject;
            $email->message=$request->message;
            $email->save();
        //success alert
            Alert::success('رائع','تم إرسال الرسالة بنجاح');
        //redirect
        return redirect()->back();
    }
    public function destroy($id)
    {
        //dd(has_reply($id));
        $contact=contact_us::findOrfail($id);        
        //insert date in deleted contact table
        $delete_contact= new deleted_contact;
        $delete_contact->consumer_id=$contact->consumer_id;
        $delete_contact->contact_id=$contact->id;
        $delete_contact->name=$contact->name;
        $delete_contact->email=$contact->email;
        $delete_contact->title=$contact->title;
        $delete_contact->message=$contact->message;
        $delete_contact->image=$contact->image;
        $delete_contact->status=$contact->status;
        $delete_contact->save();        
        //if has peply insert in delete reply
        if(has_reply($id)){
            $reply=reply_contact::where('contact_us_id',$id)->first();
            $deleted_reply=new deleted_reply;
            $deleted_reply->reply_id=$reply->id;
            $deleted_reply->admin_id=$reply->admin_id;
            $deleted_reply->contact_us_id=$delete_contact->id;
            $deleted_reply->to=$reply->to;        
            $deleted_reply->subject=$reply->subject;
            $deleted_reply->message=$reply->message;
            $deleted_reply->created_at=$reply->created_at;
            $deleted_reply->updated_at=$reply->updated_at;
            $deleted_reply->save();
            }
        //delete contact
        $contact->delete();
        //success alert
        Alert::success('رائع','تم حذف الرسالة');
        //redirect to contacts
        return redirect(route('admin.all.contacts'));
    }    
}
