<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test_mail;
use App\Jobs\Test_job;

class TestController extends Controller
{
    public function create_normal_email()
    {
        return view('tests.send-normal-mail');
    }

    public function send_normal_email(Request $request)
    {
        //validate
        $this->validate($request,[
            'name' =>'required|min:3',
            'email' =>'required|email',
            'title' => 'required|min:6',
            'message' =>'required|min:6'
        ]);
        $data=array(
            'to'=> $request->email,
            'name' => $request->name,
            'email' => $request->email,
            'subject'=>$request->title,
            'message' => $request->message
        );
        //send mail
        Mail::to($data['email'])->send(new Test_mail($data));
        //redirect
        return redirect()->back();

    }

    public function create_cron_job_email()
    {
        return view('tests.send-by-cron-job-mail');
    }
    public function send_cron_job_email(Request $request)
    {
        //validate
        $this->validate($request,[
            'name' =>'required|min:3',
            'email' =>'required|email',
            'title' => 'required|min:6',
            'message' =>'required|min:6'
        ]);
        $data=array(
            'to'=> $request->email,
            'name' => $request->name,
            'email' => $request->email,
            'subject'=>$request->title,
            'message' => $request->message
        );
        //send mail
        Test_job::dispatch(new Test_job($data));
        //redirect
        return redirect()->back();
    }
}
