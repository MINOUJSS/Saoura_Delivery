<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\wish_list;
use App\compar_list;
use App\product;
use App\consumer;
use App\order_product;
use App\order;
use Illuminate\Support\Facades\Hash;
use Auth;

class ConsumerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:consumer','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        //dd(request()->root());        
        return view('store.consumer.index');
    }
    public function edit_account($consumer_id)
    {
        if(Auth::guard('consumer')->user()->id==$consumer_id)
        {
        $consumer=consumer::find($consumer_id);
        return view('store.consumer.edit-account',compact('consumer'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function update_account(Request $request)
    {
        //validate data
        $this->validate($request,[
            'name' =>'required|min:3|max:25',
            'lastname' =>'min:3|max:25',
            'email' =>'required|email',
            'tel' =>'required|numeric|min:9', 
            'address'=>'min:25',
            'googl_map_address'=>'min:25'
        ]);
        //update data
            $consumer=consumer::findOrfail($request->consumer_id);
            $consumer->name=$request->name;
            $consumer->lastname=$request->lastname;
            $consumer->email=$request->email;
            $consumer->telephone=$request->tel;
            $consumer->address=$request->address;
            $consumer->googl_map_address=$request->googl_map_address;
            $consumer->update();
        //redierct back with succses message
        Alert::success('تعديل حساب','تم تعديل الحساب بنجاح');
        return redirect()->back();
    }
    public function edit_password($consumer_id)
    {
        if(Auth::guard('consumer')->user()->id==$consumer_id)
        {
        $consumer=consumer::find($consumer_id);
        return view('store.consumer.edit-password',compact('consumer'));
        }else
        {
            return redirect()->back();
        }
    }
    public function update_password(Request $request)
    {
        //validate data
        $this->validate($request,[
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        $consumer=consumer::findOrFail($request->consumer_id);
        //if old password is corect
        $old_password=$request->input('old_password');
        //dd($old_password);
        // dd(Hash::check($old_password,$consumer->password));
            if(Hash::check($old_password,$consumer->password)){
                //cange password
                $consumer->password=Hash::make($request->password);
                $consumer->update();
                //success message
                Alert::success('تعديل كلمة المرور','تم تعديل كلمة المرور بنجاح');
                //
                return redirect()->back();
            }else
            {
                //return with error message
                Alert::error('خطأ','كلمة المرور خاطئة');
                //
                return redirect()->back();
            }
    }
    public function orders($consumer_id)
    {
        if(Auth::guard('consumer')->user()->id==$consumer_id){
        //$products=order_product::where('consumer_id',$consumer_id)->get();
        $orders=order::where('consumer_id',$consumer_id)->paginate(10);
        return view('store.consumer.orders',compact('orders'));
        }else
        {
            return redirect(route('consumer.orders',Auth::guard('consumer')->user()->id));
        }
    }
    public function order_details($id)
    {
        $products=order_product::where('order_id',$id)->get();
        return view('store.consumer.order-details',compact('products'));
    }
    public function add_to_wish_list($product_id)
    {        
        //check if this prodict is in list
        $in_w_list=wish_list::where('product_id',$product_id)->first();
        if($in_w_list==null)
        {
            //add to wish list
            $w_list= new wish_list;
            $w_list->consumer_id=Auth::guard('consumer')->user()->id;
            $w_list->product_id=$product_id;
            $w_list->save();
                    //alert success
        //Alert::success('إضافة منتج إلى المفضلة','تم إضافة المنتج إلى قائمة المفضلة بنجاح');
         return true;
        }else
        {
            $w_list=wish_list::where('product_id',$product_id)->first();
            $w_list->delete();
            //alert success
            //Alert::success('حذف منتج من المفضلة','تم حذف المنتج من قائمة المفضلة بنجاح');
            return false;
        }
        //return redirect()->back();
    }

    public function add_to_compar_list($product_id)
    {
        //check if this prodict is in list
        $in_c_list=compar_list::where('product_id',$product_id)->first();
        if($in_c_list==null)
        {
            //add to wish list
            $c_list= new compar_list;
            $c_list->consumer_id=Auth::guard('consumer')->user()->id;
            $c_list->product_id=$product_id;
            $c_list->save();
            //alert success
        //Alert::success('إضافة منتج للمقارنة','تم إضافة المنتج إلى قائمة المقارنة بنجاح');
        return true;
        }else
        {
            $c_list=compar_list::where('product_id',$product_id)->first();
            $c_list->delete();
                //alert success
        //Alert::success('حذف منتج من المقارنة','تم حذف المنتج من قائمة المقارنة بنجاح');
        return false;
        }        
        return redirect()->back();
    }

    public function wish_list()
    {
       $w_list=wish_list::where('consumer_id',Auth::guard('consumer')->user()->id)->get();
       $query=product::orderBy('id','desc');
       if(count($w_list)>0)
       {
            foreach($w_list as $item)
            {
                $query->orwhere('id',$item->product_id);
            }
       $products=$query->paginate(12);
        }else
        {
         $products=product::where('id',0)->paginate(12);
        }
        return view('store.wish-list',compact('products'));
    }

    public function compar_list()
    {
        $c_list=compar_list::where('consumer_id',Auth::guard('consumer')->user()->id)->get();
       $query=product::orderBy('id','desc');
       if(count($c_list)>0)
       {
            foreach($c_list as $item)
            {
                $query->orwhere('id',$item->product_id);
            }
       $products=$query->paginate(12);
        }else
        {
         $products=product::where('id',0)->paginate(12);
        }
        return view('store.compar-list',compact('products'));
    }
}
