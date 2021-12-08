<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\order_product;
use App\invoice;

class InvoiceController extends Controller
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

    public function invoice($order_id)
    { 
        $title='طباعة فاتورة';        
        $order=Order::findOrfail($order_id);
        $products=order_product::where('order_id',$order_id)->get();
        //
        $total=0;
        $binifis=0;
        $price_wout_dis=0;
        foreach($products as $product)
        {
            $price_wout_dis=$price_wout_dis+$product->product->selling_price;
            if(has_discount_in_this_order_date($product->product_id,$order->created_at))
            {
                // $total=$total+(price_with_discount($product->product->selling_price,get_product_discount($product->product_id)) * $product->qty);
                $total=$total+(price_with_discount($product->product_id) * $product->qty);
                $binifis=$binifis+(get_product_binifis_with_discount($product->product_id) * $product->qty);
            }else
            {
                $total=$total+($product->product->selling_price * $product->qty);
                $binifis=$binifis+(get_product_binifis($product->product_id) * $product->qty);
            }
        } 
        $discount_price=$price_wout_dis-$total;
        $discount=($discount_price*100)/$price_wout_dis;
        //insert in invoice table
        $invoice=new invoice;
        $invoice->order_id=$order_id;
        $invoice->discount=$discount;    
        $invoice->total=$total;
        $invoice->benifis=$binifis;
        $invoice->save();
        return view('admin.inc.invoice.invoice-print',compact('order','products','invoice','title'));
    }

    public function print_invoice($order_id)
    { 
        $title='طباعة فاتورة';       
        $order=Order::findOrfail($order_id);
        $products=order_product::where('order_id',$order_id)->get();        
        $invoice=invoice::where('order_id',$order_id)->first();
        return view('admin.inc.invoice.invoice-print',compact('order','products','invoice','title'));
    }
}
