<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\product;
use App\brand;
use App\supplier;
use App\category;

class ProductController extends Controller
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
        $products=product::orderBy('id','desc')->paginate(10);
        return view('admin.products',compact('products'));
    }
   
    public function create()
    {
        $brands=brand::all();
        $suppliers=supplier::all();
        $categories=category::all();
        return view('admin.create-product',compact('brands','suppliers','categories'));
    }

    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'product_name' =>'required|min:3',
            // 'product_brand' =>'required',
            // 'product_supplier' =>'required',
            'product_short_description' => 'required|max:20',
            'product_long_description' => 'required|min:50',
            'product_Purchasing_price' => 'required',
            'product_to_magazin_price' => 'required',
            'product_to_consumer_price' =>'required',
            'product_ombalage_price' => 'required',
            'product_adds_price' =>'required',
            'product_selling_price' => 'required',
            'product_qty' => 'required',
            'product_category' => 'required',
            // 'product_sub_category' => 'required',
            // 'product_sub_sub_category' => 'required',
            'product_image' =>'required|mimes:jpeg,bmp,png'
        ]);
        //save data
        $product=new product;
        //upload image
        if($file=$request->file('product_image'))
        {
            $extention=$request->file('product_image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/products',$imagename))
            {
                //insert into database;
                $product->image=$imagename;
            }
        }                    
        $product->user_id=$request->input('user_id');
        $product->supplier_id=$request->input('product_supplier');
        $product->name=$request->input('product_name');
        $product->brand_id=$request->input('product_brand');
        $product->short_description=$request->input('product_short_description');
        $product->long_description=$request->input('product_long_description');
        $product->Purchasing_price=$request->input('product_Purchasing_price');
        $product->to_magazin_price=$request->input('product_to_magazin_price');
        $product->to_consumer_price=$request->input('product_to_consumer_price');
        $product->ombalage_price=$request->input('product_ombalage_price');
        $product->adds_price=$request->input('product_adds_price');
        $product->selling_price=$request->input('product_selling_price');
        $product->qty=$request->input('product_qty');
        $product->category_id=$request->input('product_category');
        $product->sub_category_id=$request->input('product_sub_category');
        $product->sub_sub_category_id=$request->input('product_sub_sub_category');
        $product->save();
        //alert success message
        Alert::success('إضافة منتج', 'تم إضافة المنتج بنجاح');
        //redirecte to category page
        return redirect(route('admin.products'));
    }

    public function edit($id)
    {
        $product=product::findOrfail($id);
        $brands=brand::all();
        $suppliers=supplier::all();
        $categories=category::all();        
        return view('admin.edit-product',compact('product','brands','suppliers','categories'));
    }

    public function update(Request $request)
    {
        //validate data
        $this->validate($request,[
            'product_name' =>'required|min:3',
            // 'product_brand' =>'required',
            // 'product_supplier' =>'required',
            'product_short_description' => 'required|max:20',
            'product_long_description' => 'required|min:50',
            'product_Purchasing_price' => 'required',
            'product_to_magazin_price' => 'required',
            'product_to_consumer_price' =>'required',
            'product_ombalage_price' => 'required',
            'product_adds_price' =>'required',
            'product_selling_price' => 'required',
            'product_qty' => 'required',
            'product_category' => 'required',
            // 'product_sub_category' => 'required',
            // 'product_sub_sub_category' => 'required',
            'product_image' =>'required|mimes:jpeg,bmp,png'
        ]);
        //save data
        $product=product::findOrfail($request->input('product_id'));
        //upload image
        if($file=$request->file('product_image'))
        {
            //delet old image
            $old_image=$product->image;
            if(\File::exists(public_path('admin-css/uploads/images/products/'.$old_image)))
           {
            \File::delete(public_path('admin-css/uploads/images/products/'.$old_image));
           }
            $extention=$request->file('product_image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/products',$imagename))
            {
                //insert into database;
                $product->image=$imagename;
            }
        }                    
        $product->user_id=$request->input('user_id');
        $product->supplier_id=$request->input('product_supplier');
        $product->name=$request->input('product_name');
        $product->brand_id=$request->input('product_brand');
        $product->short_description=$request->input('product_short_description');
        $product->long_description=$request->input('product_long_description');
        $product->Purchasing_price=$request->input('product_Purchasing_price');
        $product->to_magazin_price=$request->input('product_to_magazin_price');
        $product->to_consumer_price=$request->input('product_to_consumer_price');
        $product->ombalage_price=$request->input('product_ombalage_price');
        $product->adds_price=$request->input('product_adds_price');
        $product->selling_price=$request->input('product_selling_price');
        $product->qty=$request->input('product_qty');
        $product->category_id=$request->input('product_category');
        $product->sub_category_id=$request->input('product_sub_category');
        $product->sub_sub_category_id=$request->input('product_sub_sub_category');
        $product->update();
        //alert success message
        Alert::success('تعديل منتج', 'تم التعديل المنتج بنجاح');
        //redirecte to category page
        return redirect(route('admin.products'));
    }

    public function destroy($id)
    {
        $product=product::findOrFail($id);
        //delete all small product images
        // ................... 

        //delete the big product images
        $image=$product->image;
            if(\File::exists(public_path('admin-css/uploads/images/products/'.$image)))
           {
            \File::delete(public_path('admin-css/uploads/images/products/'.$image));
           }
        //delete product data
        $product->delete();
        //notificte Admin

        //redirect to back
    }

}
