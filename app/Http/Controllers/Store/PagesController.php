<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\about_us;
use App\contra;
use App\how_to_ship;
use App\faq;
use App\contact_us;
use App\consumer;
use App\email_list;
use App\admin_notefication;
use Auth;

class PagesController extends Controller
{
    public function about_us()
    {
        $about=about_us::orderBy('id','desc')->first();
        return view('store.about-us',compact('about'));
    }

    public function contra()
    {
        $contra=contra::orderBy('id','desc')->first();
        return view('store.contra',compact('contra'));
    }

    public function how_to_ship()
    {
        $how_to_ship=how_to_ship::orderBy('id','desc')->first();
        return view('store.how-to-ship',compact('how_to_ship'));
    }

    public function contact_us()
    {
        return view('store.contact-us');
    }
    
    public function contact_us_store(Request $request)
    {
        //validation
        if(Auth::guard('consumer')->check())
        {
            $this->validate($request,[
                'title'=>'required|min:6',
                'message'=>'required|min:10'
            ]);            
        }else
        {
            $this->validate($request,[
                'name'=>'required|min:3',
                'email'=>'required|email',
                'title'=>'required|min:6',
                'message'=>'required|min:10'
            ]);            
        }        
        //check if email exist
        $email=$request->email;
        $consumer=consumer::where('email',$email)->first();        
        //if exit get consumer id
        if($consumer!=null)
        {
         $consumer_id=$consumer->id;   
        }else{
        //else insert to emails list
        $consumer_id=0;
        }
        //insert contact to database
        $contact = new contact_us;
        $contact->consumer_id=$consumer_id;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->title=$request->title;
        $contact->message=$request->message;
        $contact->save();
        // noteficate admin abou this contact
        $note=new admin_notefication;
        $note->title='لديك رسالة جديدة(إتصل بنا)';
        $note->icon='fa fa-envelope';
        $note->type=2;
        $note->link="/admin/contact/".$contact->id;
        $note->save();
        //send mail to this consumer

        //alert to thanks this consumer about this contact
        Alert::success('إرسال رسالة','تم إرسال رسالتك بنجاح,و سيتم الرد عليك في أقرب وقت ممكن.شكراً على الإتصال');
        //redirect to products page
        return redirect(route('products'));
    }

    public function faq()
    {
        return view('store.faq');
    }

    public function faq_store(Request $request)
    {
        //validation
        if(Auth::guard('consumer')->check())
        {
            $this->validate($request,[
                'question'=>'required|min:10'
            ]);            
        }else
        {
            $this->validate($request,[
                'name'=>'required|min:3',
                'email'=>'required|email',
                'question'=>'required|min:10'
            ]);            
        }       
        //check if email exist
        $email=$request->email;
        $consumer=consumer::where('email',$email)->first();        
        //if exit get consumer id
        if($consumer!=null)
        {
         $consumer_id=$consumer->id;   
        }else{
        //else insert to emails list
        $consumer_id=0;
        }
        //insert contact to database
        $faq = new faq;
        $faq->consumer_id=$consumer_id;
        $faq->name=$request->name;
        $faq->email=$request->email;
        $faq->question=$request->question;    
        $faq->save();
        // noteficate admin abou this contact
        $note=new admin_notefication;
        $note->title='لديك سؤال جديد(أسئلة شائعة)';
        $note->icon='fa fa-question-circle';
        $note->type=3;
        $note->link="/admin/contact/".$faq->id;
        $note->save();
        //send mail to this consumer

        //alert to thanks this consumer about this contact
        Alert::success('إرسال سؤال','تم إرسال سؤالك بنجاح,و سيتم الرد عليك في أقرب وقت ممكن.شكراً على السؤال');
        //redirect to products page
        return redirect(route('products'));
    }
    public function email_list_store(Request $request)
    {
        //validate
        $this->validate($request,[
            'email' => 'required|email'
        ]);
        //verifier if email exist in list
        $ex_email=email_list::where('email',$request->email)->first();
        if($ex_email!=null)
        {
            //alert
            Alert::error('تسجيل في القائمة','أنت مسجل فعلا في القائمة البريدية لا يمكنك التسجيل مرتين بنفس البريد الإلكتروني.');
            //
            return redirect()->back();
        }else
        {
        //insert data
        $email= new email_list;
        $email->email=$request->email;
        $email->save();
        //alert
        Alert::success('تسجيل في القائمة','تم تسجيلك في القائمة البريدية بنجاح,مرحباً بك.');
        //
        return redirect()->back();
        }
    }
}
