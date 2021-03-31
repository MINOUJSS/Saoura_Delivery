<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Consumer;
use App\order;
use App\order_product;
use App\admin_notefication;
use Auth;

class OrderController extends Controller
{
    public function create_order(Request $request)
    {
        // 
        //check if is consumer or not var $consumer_id        
        if(Auth::guard('consumer')->check())
        {
            $consumer_id = Auth::guard('consumer')->user()->id;
        }
        else
        {
            $consumer_id = 0;
        }
       // return Auth::guard()-;
       
        //validate data
        $this->validate($request,[
            'first-name' => 'required|min:3',
            'email' => 'required|email',
            'address' =>'required|min:10',
            'tel' => 'required|numeric|min:9',            
        ]);
        if($request->create_account=='on')
        {
            $this->validate($request,[
            'password' =>'required|min:6'
            ]);
        }
        
        //if create acount is checked create consumer and get $consumer_id
        if($request->create_account=='on')
        {
            //create consumer
            $consumer=new Consumer;
            $consumer->name=$request->input('first-name');
            $consumer->email=$request->input('email');
            $consumer->address=$request->input('address');
            $consumer->password=Hash::make($request->input('password'));
            $consumer->telephone=$request->input('tel');
            $consumer->save();            
            //get consumer id
            $consumer_id=$consumer->id;
        }
        //create Order
        $order=new order;
        $order->consumer_id=$consumer_id;
        $order->billing_name=$request->input('first-name');
        $order->billing_email=$request->email;
        $order->billing_address=$request->address;
        $order->billing_mobile=$request->tel;
        $order->status=0;
        $order->save();
        //create order product
        for($x=0;$x<=count($request->product_id)-1;$x++)
        {
        $order_product=new order_product;
        $order_product->order_id=$order->id;
        $order_product->product_id=$request->product_id[$x];
        $order_product->consumer_id=$consumer_id;
        $order_product->qty=$request->product_qty[$x];
        $order_product->color_id=$request->product_color[$x];
        $order_product->size_id=$request->product_size[$x];
        $order_product->save();
        }        
        //remove cart session
        session()->forget('cart');
        //notificate admin about this order
        $note=new admin_notefication;
        $note->title='لديك طلب جديد';
        $note->icon ='fa fa-cart-plus';
        $note->type=2;
        $note->link="/admin/order/".$order->id;
        $note->save();
        //notifucate user about  this order
        
        //alert for success message
        Alert::success('إضافة طلب', 'تم إضافة طلبك بنجاح');
        // redirect to my orders page;
        return redirect()->back();

    }
}
