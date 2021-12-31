<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thank_Consummer_For_Contact;
use App\Jobs\Contact_Us_Thanks_Mail;
use App\about_us;
use App\contra;
use App\how_to_ship;
use App\faq;
use App\contact_us;
use App\Consumer;
use App\email_list;
use App\admin_notefication;
use App\product;
use App\sid_deal;
use Auth;

class PagesController extends Controller
{
    public function about_us()
    {
        $title='من نحن';
        $about=about_us::orderBy('id','desc')->first();
        return view('store.about-us',compact('title','about'));
    }

    public function contra()
    {
        $title='سياسة خصوصية';
        $contra=contra::orderBy('id','desc')->first();
        return view('store.contra',compact('title','contra'));
    }

    public function how_to_ship()
    {
        $title='طريقة تسليم الطلبات';
        $how_to_ship=how_to_ship::orderBy('id','desc')->first();
        return view('store.how-to-ship',compact('title','how_to_ship'));
    }

    public function contact_us()
    {
        $title='إتصل بنا';
        return view('store.contact-us',compact('title'));
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
        $consumer=Consumer::where('email',$email)->first();        
        //if exit get consumer id
        if($consumer!=null)
        {
         $consumer_id=$consumer->id;   
        }else{
        //else insert to emails list
        $consumer_id=1;
        }
        //insert contact to database
        $contact = new contact_us;
        $contact->consumer_id=$consumer_id;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->title=$request->title;
        $contact->message=$request->message;
        $contact->status=0;
        $contact->save();
        // // noteficate admin abou this contact
        // $note=new admin_notefication;
        // $note->title='لديك رسالة جديدة(إتصل بنا)';
        // $note->icon='fa fa-envelope';
        // $note->type=2;
        // $note->link="/admin/contact/".$contact->id;
        // $note->save();
        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->title
        );
        //send mail to this consumer
        dispatch(new Contact_Us_Thanks_Mail($data));
        //alert to thanks this consumer about this contact
        Alert::success('إرسال رسالة','تم إرسال رسالتك بنجاح,و سيتم الرد عليك في أقرب وقت ممكن.شكراً على الإتصال');
        //redirect to products page
        return redirect(route('products'));
    }

    public function faq()
    {
        $title='أسئلة شائعة';
        return view('store.faq',compact('title'));
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
        $consumer=Consumer::where('email',$email)->first();        
        //if exit get consumer id
        if($consumer!=null)
        {
         $consumer_id=$consumer->id;   
        }else{
        //else insert to emails list
        $consumer_id=1;
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
        $note->type=1;
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
            'footer_email' => 'required|email'
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
        $email->email=$request->footer_email;
        $email->save();
        //alert
        Alert::success('تسجيل في القائمة','تم تسجيلك في القائمة البريدية بنجاح,مرحباً بك.');
        //
        return redirect()->back();
        }
    }
    public function qty_zero($product_id)
    {
        $product=product::find($product_id);
        if($product==null)
        {
            return redirect(route('store.product_not_found'));
        }else
        {
        $title='نفاذ الكمية';
        $sid_deal=sid_deal::inRandomOrder()->first();
        return view('store.qty-zero',compact('title','product','sid_deal'));
        }
    }
    public function product_not_found()
    {
        $title='المنتج غير موجود';
        $sid_deal=sid_deal::inRandomOrder()->first();
        return view('store.product-not-found',compact('title','sid_deal'));
    }
}
