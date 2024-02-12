<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\order;
use App\order_product;
use App\order_discount;
use App\order_shepping;
use App\deny_order_observation;
use App\return_order_observation;
use App\product;
use App\orders_notification;
use App\Completed_Sale;
use App\admin_notefication;
use App\reading_notification;
use Auth;

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
        $global_sheeping_orders=order::where('status',2)->get();
        $orders=Order::orderBy('id','desc')->paginate(10);
        return view('admin.orders',compact('orders','global_sheeping_orders'));
    } 
    public function order_details($id)
    {
        //update status in adminnotification
        $order_note=orders_notification::where('order_id',$id)->first();
        if($order_note != null)
        {
        $order_note->status=1;
        $order_note->update();
        }
        //
        $deny_obses=deny_order_observation::all();
        $return_obses=return_order_observation::all();
        $order=Order::findOrfail($id);
        $products=order_product::where('order_id',$id)->get();
        return view('admin.order-details',compact('order','products','deny_obses','return_obses'));
    } 
    
    public function order_edit($id)
    {
        //
        $deny_obses=deny_order_observation::all();
        $return_obses=return_order_observation::all();
        //
        $order=Order::findOrfail($id);
        $products=order_product::where('order_id',$id)->get();
        return view('admin.order-edit',compact('order','products','deny_obses','return_obses'));
    }

    public function update_order(Request $request)
    {
        //validate data
        $this->validate($request,[
            'first-name' => 'required|min:1',
            'email' => 'sometimes:required|sometimes:email',
            'address' =>'required',
            'tel' => 'required|numeric|min:9',            
        ]);
          
        //update Order
        $order=order::findOrFail($request->order_id);
        // dd($request);
        $order->billing_name=$request->input('first-name');
        $order->billing_email=$request->email;
        $order->billing_address=$request->address;        
        $order->billing_mobile=$request->tel;
        $order->total=$request->total;
        $order->update();
        
        //get product_id_array
        $product_ids_array=$request->items_ids_array;
        $p_ids_array=explode(',',$product_ids_array);
        //update order product
        for($x=0;$x<=count($p_ids_array)-1;$x++)
        {
        $order_product=order_product::find($p_ids_array[$x]);
        // $order_product->product_id=$request->product_id[$x];
        $order_product->qty=$request->input('qty-'.$p_ids_array[$x]);
        if($request->input('color-'.$p_ids_array[$x])==0)
        {
            $order_product->color_id=1;
        }else
        {
            $order_product->color_id=$request->input('color-'.$p_ids_array[$x]);
        }
        if($request->input('size-'.$p_ids_array[$x])==0)
        {
            $order_product->size_id=1;
        }else
        {
            $order_product->size_id=$request->input('size-'.$p_ids_array[$x]);
        }                        
        $order_product->save();
        //modify the qty in magazin
        $product=product::find($order_product->product->id);
        $product->qty=($product->qty - $request->input('qty-'.$p_ids_array[$x]));
        $product->update();
        }
        //update order discount
        $order_discount=order_discount::where('order_id',$order->id)->first();

        if($order_discount!=null)
        {
            $order_discount->discount=$request->input('global-discount');
            $order_discount->update();
        }else
        {
         $order_discount=new order_discount;
         $order_discount->order_id=$order->id;
         $order_discount->discount=0;
         $order_discount->save();
        }        
        // update shepping
        $order_shepping=order_shepping::where('order_id',$order->id)->first();
        if($order_shepping != null)
        {
            $order_shepping->shepping=$request->input('sheping');
            $order_shepping->update();
        }
        else
        {
         $order_shepping=new order_shepping;
         $order_shepping->order_id=$order->id;
         $order_shepping->shepping=0;
         $order_shepping->save();
        }
        //send thanks email to user about  this order
        
        //alert for success message
        Alert::success('تعديل طلب', 'تم تعديل الطلب بنجاح');
        // redirect to thank you page;
        //return redirect()->back();
        return redirect()->back();

    }

    public function order_confirm($order_id)
    {
        //find order
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=1;
        $order->update();
                //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتأكيد الطلب رقم '.$order_id;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        //redirect 
        // return redirect()->back();
    }

    public function order_ship($order_id)
    {
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=2;
        $order->update();
        //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإرسال الطلب رقم '.$order_id;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        //redirect 
        // return redirect()->back();
    }

    public function order_complate($order_id)
    {
        $order=Order::findOrfail($order_id);
        //update status
        $order->status=3;
        $order->update();        
        //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتسليم الطلب رقم '.$order_id;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save(); 
//insert in compladed sales table
$order_products=order_product::where('order_id',$order_id)->get();
foreach($order_products as $product)
{
    $completed_sale=new Completed_Sale;
    $completed_sale->consumer_id=$product->order->consumer_id;
    $completed_sale->order_id=$order_id;
    $completed_sale->product_id=$product->product_id;
    $completed_sale->product_name=$product->product->name;
    $completed_sale->charge_price=get_product_charge($product->product->id);
    $completed_sale->selling_price=price_with_discount($product->product->id);
    $completed_sale->qty=$product->qty;
    $completed_sale->save();
}                        
    }

    public function order_deny(Request $request)
    {
        $order=Order::findOrfail($request->order_id);
        //update status
        if($request->obs!="0")
        {
        $order->status=4;
        $order->obs=get_deny_order_obs_from_id($request->obs);
        $order->update();
        //modify product qty in magazin
        $products=$order->order_products;
        foreach($products as $product)
        {
            $product_data=product::find($product->product_id);
            $product_data->qty=$product_data->qty + $product->qty;
            $product_data->update();
        }
        //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإلغاء الطلب رقم '.$order->id;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        //alert success
            Alert::success('رائع','تم إلغاء الطلب');
        //redirect back()
            return redirect()->back();
        }else
        {
            //alert error
            Alert::error('خطأ','عليك إختيار سبب إلغاء الطلب قبل الإلغاء');
            //redirect back
            return redirect()->back();
        }
        // //redirect 
        // // return redirect()->back();
    }

    public function order_return(Request $request)
    {
        $order=Order::findOrfail($request->order_id);
        //update status
        if($request->obs!="0")
        {
        $order->status=5;
        $order->obs=get_return_order_obs_from_id($request->obs);
        $order->update();
        //modify product qty in magazin
        $products=$order->order_products;
        foreach($products as $product)
        {
            $product_data=product::find($product->product_id);
            $product_data->qty=$product_data->qty + $product->qty;
            $product_data->update();
        }
        // deleted from complate sales
        $completed_sales=Completed_Sale::where('order_id',$order->id)->get();
        foreach($completed_sales as $sale)
        {
            $sale->delete();
        }
        //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإعادة الطلب رقم '.$order->id;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        //alert success
            Alert::success('رائع','تم إعادة الطلب');
        //redirect back()
            return redirect()->back();
        }else
        {
            //alert error
            Alert::error('خطأ','عليك إختيار سبب إلغاء الطلب قبل الإلغاء');
            //redirect back
            return redirect()->back();
        }
    }

    public function delete_product_from_order($order_id,$product_id)
    {
       $order_product=order_product::where('order_id',$order_id)->where('product_id',$product_id)->first();
       $order_product->delete();
       //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف منتج من الطلب رقم '.$order_id;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
       return redirect()->back();
    }

    public function deny_order_observation()
    {
        $deny_obses=deny_order_observation::orderBy('id','desc')->get();        
        return view('admin.inc.orders.deny-order-obs',compact('deny_obses'));
    }

    public function return_order_observation()
    {
        $return_obses=return_order_observation::orderBy('id','desc')->get();
        return view('admin.inc.orders.return-order-obs',compact('return_obses'));
    }
    
    public function create_deny_order_observation()
    {
        return view('admin.inc.orders.create-deny-order-obs');
    }

    public function store_deny_order_observation(Request $request)
    {
      //validate
      $this->validate($request,[
          'obs' => 'required'
      ]);  
      //save data
      $deny_obs=new deny_order_observation;
      $deny_obs->obs=$request->obs;
      $deny_obs->save();
      //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة سبب إلغاء الطلب '.$deny_obs->obs;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
      //alert success
      Alert::success('رائع','تم إضافة سبب إلغاء الطلب بنجاح');
      //redirect back()
      return redirect()->back();
    }

    public function edit_deny_order_observation($id)
    {
        $obs=deny_order_observation::findOrfail($id);
        return view('admin.inc.orders.edit-deny-order-obs',compact('obs'));
    }

    public function update_deny_order_observation(Request $request)
    {
        //validate
       $this->validate($request,[
        'obs' => 'required'
       ]);  
        //save data
        $deny_obs=deny_order_observation::findOrfail($request->obs_id);
        $deny_obs->obs=$request->obs;
        $deny_obs->update();
              //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل سبب إلغاء الطلب '.$deny_obs->obs;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        //alert success
        Alert::success('رائع','تم تعديل سبب إلغاء الطلب بنجاح');
        //redirect back()
        return redirect()->back();
    }

    public function destroy_deny_order_observation($id)
    {
        $deny_obs=deny_order_observation::find($id);
        $deny_obs->delete();
              //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف سبب إلغاء الطلب '.$deny_obs->obs;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
    }
    public function create_return_order_observation()
    {
        return view('admin.inc.orders.create-return-order-obs');        
    }
    public function store_return_order_observation(Request $request)
    {
      //validate
      $this->validate($request,[
          'obs' => 'required'
      ]);  
      //save data
      $return_obs=new return_order_observation;
      $return_obs->obs=$request->obs;
      $return_obs->save();
            //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة سبب إعادة الطلب '.$return_obs->obs;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
      //alert success
      Alert::success('رائع','تم إضافة سبب إرجاع الطلب بنجاح');
      //redirect back()
      return redirect()->back();
    }
    public function edit_return_order_observation($id)
    {
        $obs=return_order_observation::findOrfail($id);
        return view('admin.inc.orders.edit-return-order-obs',compact('obs'));
    }

    public function update_return_order_observation(Request $request)
    {
        //validate
       $this->validate($request,[
        'obs' => 'required'
       ]);  
        //save data
        $return_obs=return_order_observation::findOrfail($request->obs_id);
        $return_obs->obs=$request->obs;
        $return_obs->update();
                    //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل سبب إعادة الطلب '.$return_obs->obs;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
        //alert success
        Alert::success('رائع','تم تعديل سبب إرجاع الطلب بنجاح');
        //redirect back()
        return redirect()->back();
    }
    public function destroy_return_order_observation($id)
    {
        $return_obs=return_order_observation::find($id);
        $return_obs->delete();
                    //noteficte admin
$note=new admin_notefication;
$note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف سبب إعادة الطلب '.$return_obs->obs;
$note->icon ='fa fa-info-circle';
$note->type=1;
$note->link=route('admin.orders');
$note->save();
//insert reading note for this admin
$r_note=new reading_notification;
$r_note->admin_id=Auth::guard('admin')->user()->id;
$r_note->note_id=$note->id;
$r_note->save();        
    }
}
