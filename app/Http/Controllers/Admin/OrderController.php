<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\order_product;

class OrderController extends Controller
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
        $orders=Order::orderBy('id','desc')->paginate(10);
        return view('admin.orders',compact('orders'));
    } 
    public function order_details($id)
    {
        $order=Order::findOrfail($id);
        $products=order_product::where('order_id',$id)->get();
        return view('admin.order-details',compact('order','products'));
    }  

    public function order_confirm($order_id)
    {
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=1;
        $order->update();
        //redirect 
        // return redirect()->back();
    }

    public function order_ship($order_id)
    {
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=2;
        $order->update();
        //redirect 
        // return redirect()->back();
    }

    public function order_complate($order_id)
    {
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=3;
        $order->update();
        //redirect 
        // return redirect()->back();
    }

    public function order_deny($order_id)
    {
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=4;
        $order->update();
        //redirect 
        // return redirect()->back();
    }

    public function order_return($order_id)
    {
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=5;
        $order->update();
        //redirect 
        // return redirect()->back();
    }
    
}
