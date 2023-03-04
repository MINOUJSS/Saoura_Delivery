<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\reating;
use App\admin_notefication;
use Auth;

class RatingController extends Controller
{
    public function create(Request $request)
    {        
        $name="";
        $email="";
        //validation        
        if(Auth::guard('consumer')->check() && Auth::guard('consumer')->user()->id != 1)
        {            
            //if is consumer validation
            $this->validate($request,[
                'rating_text' => 'required',
                'rating' =>'required'
            ]);
            $consumer_id=Auth::guard('consumer')->user()->id;
            $name=Auth::guard('consumer')->user()->name;
            $email=Auth::guard('consumer')->user()->email;
        }else
        {
            //if is nat consumer validation
            $this->validate($request,[
                'name' =>'required|min:3',
                // 'email' =>'required|email',                
                'rating_text' => 'required',
                'rating' =>'required'
            ]);
            $consumer_id=1;
            $name=$request->name;
            $email=$request->email;            
        }              
        //insert data in rating table       
        $rating=new Reating;
        $rating->product_id=$request->product_id;
        $rating->consumer_id=$consumer_id;
        $rating->name=$name;
        $rating->email=$email;
        $rating->review=$request->rating_text;
        $rating->reating=$request->rating;        
        $rating->save();
        //noteficate admin about this rating
        $note=new admin_notefication;
        $note->title='تقييم جديد لمنتج';
        $note->icon='fa fa-commenting';
        $note->type=1;
        $note->link="/admin/rating/".$rating->id;
        $note->save();
        //alert with success mesage
        Alert::success('إضافة مراجعة', 'تم إضافة مراجعتك للمنتج بنجاح');
        //redirecte back()
        return redirect()->back();
        // dd($request);
    }
}
