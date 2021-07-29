<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Consumer;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsumerResetPassword;

class ConsumerResetPasswordController extends Controller
{
    public function ResetPassword(Request $request)
    {
        //validate the form and verify if email exist in data base
        $this->validate($request,[
            'email' => 'required|email|exists:consumers'
        ]);
        //generate password
        $password=Str::random(8);
        $hashed_random_password = Hash::make($password);
        //insert the hash pasword in consumer acount
        $consumer=Consumer::where('email',$request->email)->first();
        $consumer->password = $hashed_random_password;
        $consumer->update();
        //send i to consumer
        $message="هدة هي كلمة المرور الخاصة بك قم يقص و لصق الكلمة في واجهة الدخول إلى الموقع";
        $message.="<br>".$password;
        $data=[
            'name' => $consumer->name,
            'message' => $message
        ];
        //($data);
        Mail::to($request->email)->send(new ConsumerResetPassword($data));
        //redirect to login form
        return redirect()->back()->with('message','ok');

    
    }
}
