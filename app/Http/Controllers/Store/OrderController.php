<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Consumer;
use App\order;
use App\order_product;
use App\orders_notification;
use App\product;
use App\Jobs\send_info_mail_about_oreder_to_admin;
use App\Admin;
use Auth;

class OrderController extends Controller
{
    public function create_order(Request $request)
    {
        // 
        //check if is consumer or not var $consumer_id        
        if(Auth::guard('consumer')->check() && Auth::guard('consumer')->user()->id!=1)
        {
            $consumer_id = Auth::guard('consumer')->user()->id;
        }
        else
        {
            $consumer_id = 1;
        }
       // return Auth::guard()-;
       
        //validate data
        $this->validate($request,[
            'first-name' => 'required|min:3',
            'email' => 'sometimes:required|sometimes:email',
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
        //chick if auth has adderess
        if((Auth::guard('consumer')->check()) && (Auth::guard('consumer')->user()->address)==null)
        {
            $consumer=consumer::find(Auth::guard('consumer')->user()->id);
            $consumer->address=$request->address;
            $consumer->update();
        }
        //create Order
        $order=new order;
        $order->consumer_id=$consumer_id;
        $order->billing_name=$request->input('first-name');
        $order->billing_email=$request->email;
        $order->billing_address=$request->address;        
        $order->billing_mobile=$request->tel;
        $order->total=$request->total;
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
        if($request->product_color[$x]==0)
        {
            $order_product->color_id=1;
        }else
        {
            $order_product->color_id=$request->product_color[$x];
        }
        if($request->product_color[$x]==0)
        {
            $order_product->size_id=1;
        }else
        {
            $order_product->size_id=$request->product_size[$x];
        }                        
        $order_product->save();
        //modify the qty in magazin
        $product=product::find($request->product_id[$x]);
        $product->qty=($product->qty - $request->product_qty[$x]);
        $product->update();
        }        
        //remove cart session
        session()->forget('cart');        
        //notificate admin about this order
        $note=new orders_notification;
        $note->order_id=$order->id;
        $note->title='لديك طلب جديد';
        $note->icon ='fa fa-cart-plus';
        $note->type=1;
        $note->link="/admin/order/".$order->id;
        $note->save();
        //notificate admin about this order
        $admins=Admin::all();
        foreach ($admins as $admin) {
            $data=array(
                'email' => $admin->email,
                'name'  => $admin->name,
                'order_id' => $order->id
            );
            dispatch(new send_info_mail_about_oreder_to_admin($data));
        }
        //send thanks email to user about  this order
        
        //alert for success message
        Alert::success('إضافة طلب', 'تم إضافة طلبك بنجاح');
        // redirect to thank you page;
        //return redirect()->back();
        return redirect(route('store.thanks'))->with('order_id',$order->id);

    }
}
