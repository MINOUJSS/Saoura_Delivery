<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\product;
use App\brand;
use App\supplier;
use App\category;
use App\Product_Images;
use App\Product_videos;
use App\product_colors;
use App\product_sizes;
use App\Product_Category;
use App\Product_Sub_Category;
use App\Product_Sub_Sub_Category;
use App\color;
use App\size;
use App\reating;
use App\reading_notification;
use App\admin_notefication;
use Auth;
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
        $brands=brand::orderBy('id','desc')->where('id','!=',1)->get();
        $suppliers=supplier::orderBy('id','desc')->where('id','!=',1)->get();
        $categories=category::orderBy('id','desc')->where('id','!=',1)->get();
        return view('admin.create-product',compact('brands','suppliers','categories'));
    }

    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'name' =>'required|min:3|unique:products',
            // 'product_brand' =>'required',
            // 'product_supplier' =>'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_Purchasing_price' => 'required',
            'product_to_magazin_price' => 'required',
            'product_to_consumer_price' =>'required',
            'product_ombalage_price' => 'required',
            'product_adds_price' =>'required',
            'product_selling_price' => 'required',
            'product_qty' => 'required',
            // 'product_category' => 'required',
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
        $product->name=$request->input('name');
        $product->slug=make_slug($request->input('name'));
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
        if($request->statu==null)
        {
        $product->statu=0;
        }else
        {
            $product->statu=1;
        }
        $product->dropsheping=$request->dropsheping;
        $product->is_new=$request->is_new;
        // $product->category_id=$request->input('product_category');
        // $product->sub_category_id=$request->input('product_sub_category');
        // $product->sub_sub_category_id=$request->input('product_sub_sub_category');
        // $product->category_id=1;
        // $product->sub_category_id=1;
        // $product->sub_sub_category_id=1;
        $product->save();
        //insert to product_categories table
        if($request->category_id!=null)
        {            
            //save data
            foreach($request->category_id as $cat_id)
            {
                $product_category=new Product_Category;
                $product_category->product_id=$product->id;
                $product_category->category_id=$cat_id;
                $product_category->save();
            }

        }
        //insert to product_sub_categories table
        if($request->sub_category_id!=null)
        {            
            //save data
            foreach($request->sub_category_id as $sub_cat_id)
            {
                $product_sub_category=new Product_Sub_Category;
                $product_sub_category->product_id=$product->id;
                $product_sub_category->sub_category_id=$sub_cat_id;
                $product_sub_category->save();
            }
        }
        //insert to product_sub_sub_categories table
        if($request->sub_sub_category_id!=null)
        {            
            //save data
            foreach($request->sub_sub_category_id as $sub_sub_cat_id)
            {
                $product_sub_sub_category=new Product_Sub_Sub_Category;
                $product_sub_sub_category->product_id=$product->id;
                $product_sub_sub_category->sub_sub_category_id=$sub_sub_cat_id;
                $product_sub_sub_category->save();
            }
        }
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة منتج جديد '.$request->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('رائع', 'تم إضافة المنتج بنجاح');
        //redirecte to category page
        return redirect(route('admin.products'));
    }

    public function edit($id)
    {
        $product=product::findOrfail($id);
        $brands=brand::orderBy('id','desc')->where('id','!=',1)->get();
        $suppliers=supplier::orderBy('id','desc')->where('id','!=',1)->get();
        $categories=category::orderBy('id','desc')->where('id','!=',1)->get();
        return view('admin.edit-product',compact('product','brands','suppliers','categories'));
    }

    public function update(Request $request)
    {
        //validate data
        $this->validate($request,[
            'name' =>'required|min:3',
            // 'product_brand' =>'required',
            // 'product_supplier' =>'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_Purchasing_price' => 'required',
            'product_to_magazin_price' => 'required',
            'product_to_consumer_price' =>'required',
            'product_ombalage_price' => 'required',
            'product_adds_price' =>'required',
            'product_selling_price' => 'required',
            'product_qty' => 'required',
            // 'product_category' => 'required',
            // 'product_sub_category' => 'required',
            // 'product_sub_sub_category' => 'required',
            'product_image' =>'mimes:jpeg,bmp,png'
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
        $product->name=$request->input('name');
        $product->slug=make_slug($request->input('name'));
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
        if($request->statu==null)
        {
        $product->statu=0;
        }else
        {
            $product->statu=1;
        }
        $product->dropsheping=$request->dropsheping;
        $product->is_new=$request->is_new;
        // $product->category_id=$request->input('product_category');
        // $product->sub_category_id=$request->input('product_sub_category');
        // $product->sub_sub_category_id=$request->input('product_sub_sub_category');
        $product->update();
        //delete all product categeries
        $product_categories=Product_Category::where('product_id',$product->id)->get();
        foreach($product_categories as $p_cat)
        {
            $p_cat->delete();
        }
        //delete all product sub_categories
        $product_sub_categories=Product_Sub_Category::where('product_id',$product->id)->get();
        foreach($product_sub_categories as $p_sub_cat)
        {
            $p_sub_cat->delete();
        }
        //delete all product sub_sub_categories
        $product_sub_sub_categories=Product_Sub_Sub_Category::where('product_id',$product->id)->get();
        foreach($product_sub_sub_categories as $p_sub_sub_cat)
        {
            $p_sub_sub_cat->delete();
        }
        //insert to product_categories table                
        if($request->category_id!=null)
        {            
            //save data
            foreach($request->category_id as $cat_id)
            {
                $product_category=new Product_Category;
                $product_category->product_id=$product->id;
                $product_category->category_id=$cat_id;
                $product_category->save();
            }

        }
        //insert to product_sub_categories table
        if($request->sub_category_id!=null)
        {            
            //save data
            foreach($request->sub_category_id as $sub_cat_id)
            {
                $product_sub_category=new Product_Sub_Category;
                $product_sub_category->product_id=$product->id;
                $product_sub_category->sub_category_id=$sub_cat_id;
                $product_sub_category->save();
            }
        }
                
                //insert to product_sub_sub_categories table
                if($request->sub_sub_category_id!=null)
                {                    
                    //save data
                    foreach($request->sub_sub_category_id as $sub_sub_cat_id)
                    {
                        $product_sub_sub_category=new Product_Sub_Sub_Category;
                        $product_sub_sub_category->product_id=$product->id;
                        $product_sub_sub_category->sub_sub_category_id=$sub_sub_cat_id;
                        $product_sub_sub_category->save();
                    }
                }
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل المنتج '.$request->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('تعديل منتج', 'تم التعديل المنتج بنجاح');
        //redirecte to category page
        // return redirect(route('admin.products'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        $product=product::findOrFail($id);
        //delete all small product images
        // ................... 
        $product_images=Product_Images::where('product_id',$product->id)->get();
        foreach($product_images as $p_image)
        {
            $small_image=$p_image->image;
            if(\File::exists(public_path('admin-css/uploads/images/products/small/'.$small_image)))
           {
            \File::delete(public_path('admin-css/uploads/images/products/small/'.$small_image));
           }
        //delete product images data
        $p_image->delete();
        }
        //delete the big product images
        $image=$product->image;
            if(\File::exists(public_path('admin-css/uploads/images/products/'.$image)))
           {
            \File::delete(public_path('admin-css/uploads/images/products/'.$image));
           }
        //delete product data
        $product->delete();
           //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف المنتج '.$product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();

        //redirect to back
    }

    public function add_color($id)
    { 
        $product=product::findOrFail($id);
        $product_images=Product_Images::orderBy('id','desc')->where('product_id',$product->id)->get();
        $product_colors=product_colors::orderBy('id','desc')->where('product_id',$product->id)->get();
        $colors=color::orderBy('id','desc')->where('id','!=',1)->get();
        return view('admin.add-color-to-product',compact('product','product_images','product_colors','colors'));
    }

    public function store_color(Request $request)
    { 
        // dd($request);
        //chick if number of product colors is < product qty
        $product=product::findOrFail($request->input('product_id'));
        $product_colors=product_colors::where('product_id',$request->input('product_id'))->get();
        $prod_col_qty=0;
        foreach($product_colors as $prod_col)
        {
          $prod_col_qty+=$prod_col->qty;  
        }
        if($request->input('qty') > $product->qty || $request->input('qty') > ($product->qty -$prod_col_qty) )
        {
            //alert message the inter qty > product qty
            Alert::error('إضافة لون', 'لم يتم إضافة اللون. كمية المنتج في المخزن أقل من عدد المنتجات بهذا اللون  .');
            //return back
            return redirect()->back();
        }       
        // chick if this color unique for this product
        $exist_color=product_colors::where('product_id',$request->input('product_id'))->where('color_id',$request->input('color_id'))->get();
        if($exist_color->count() > 0 || $request->input('color_id')==0 )
        {
            //unsuccess Alert
            Alert::error('إضافة لون', 'لم يتم إضافة اللون. حدث خطأ ما.');
            //redirect back
            return redirect()->back();
        }
        else
        {
            //validate form
            $this->validate($request,[
                'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        //store color for this product
            $product_color=new product_colors;
            $product_color->user_id=$request->input('user_id');
            $product_color->product_id=$request->input('product_id');
            $product_color->color_id=$request->input('color_id');
            $product_color->qty=$request->input('qty');
        //store image for this product
        //upload image
        if($file=$request->file('image'))
        {            
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/products/colors/',$imagename))
            {
                //insert into database;
                $product_color->color_image=$imagename;
            }
        }                    
        $product_color->save();
        //
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة اللون '.$product_color->name.' للمنتج '.$product_color->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.colors');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //success Alert
        Alert::success('إضافة لون', 'تم إضافة اللون بنجاح');
        //redirecte
        return redirect()->back();
       }

    }
    public function edit_color($id)
    {        
        $prod_color=product_colors::findOrFail($id);
        $product=product::findOrFail($prod_color->product_id);
        $product_images=Product_Images::orderBy('id','desc')->where('product_id',$product->id)->get();
        $product_colors=product_colors::orderBy('id','desc')->where('product_id',$product->id)->get();
        $colors=color::all();
        return view('admin.edit-color-to-product',compact('product','product_images','product_colors','prod_color','colors'));
    }

    public function update_color(Request $request)
    {
        //chick if number of product colors is < product qty
        $product=product::findOrFail($request->input('product_id'));
        $product_colors=product_colors::where('product_id',$request->input('product_id'))->get();
        $prod_col_qty=0;
        foreach($product_colors as $prod_col)
        {
          $prod_col_qty+=$prod_col->qty;  
        }
        if($request->input('qty') > $product->qty )
        {
            //alert message the inter qty > product qty
            Alert::error('إضافة لون', 'لم يتم إضافة اللون. كمية المنتج في المخزن أقل من عدد المنتجات بهذا اللون  .');
            //return back
            return redirect()->back();
        }       
        // chick if this color unique for this product
        // $exist_color=product_colors::where('product_id',$request->input('product_id'))->where('color_id',$request->input('color_id'))->get();
        if( $request->input('color_id')==0 )
        {
            //unsuccess Alert
            Alert::error('إضافة لون', 'لم يتم إضافة اللون. حدث خطأ ما.');
            //redirect back
            return redirect()->back();
        }
        else
        {
        //store color for this product
            $product_color=product_colors::findOrFail($request->input('product_color_id'));
            $product_color->user_id=$request->input('user_id');
            $product_color->product_id=$request->input('product_id');
            $product_color->color_id=$request->input('color_id');
            $product_color->qty=$request->input('qty');
        //store image for this product
        //upload image
        if($file=$request->file('image'))
        { 
            //delet old image
             $old_image=$product_color->image;          
             if(\File::exists(public_path('admin-css/uploads/images/products/colors/'.$old_image)))
           {
            \File::delete(public_path('admin-css/uploads/images/products/colors/'.$old_image));
           }
            $extention=$request->file('image')->getClientOriginalExtension();
            $imagename=time().'.'.$extention;
            if($file->move('admin-css/uploads/images/products/colors/',$imagename))
            {
                //insert into database;
                $product_color->image=$imagename;
            }
        }                    
        $product_color->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل اللون '.$product_color->name.' للمنتج '.$product_color->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.colors');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //success Alert
        Alert::success('تعديل لون', 'تم تعديل اللون بنجاح');
        //redirecte
        return redirect()->back();
       }
    }
    public function delete_product_color($id)
    {
        $product_color=product_colors::findOrFail($id);
        //delete image
        $p_c_image=$product_color->image;
        if(\File::exists(public_path('admin-css/uploads/images/products/colors/'.$p_c_image)))
        {
            \File::delete(public_path('admin-css/uploads/images/products/colors/'.$p_c_image));
        }
        //delete data
        $product_color->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف اللون '.$product_color->name.' للمنتج '.$product_color->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.colors');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //redirect
        //return redirect()->back();
    }
    public function add_size($id)
    {    
        $product=product::findOrFail($id);
        $product_images=Product_Images::orderBy('id','desc')->where('product_id',$product->id)->get();
        $product_sizes=product_sizes::orderBy('id','desc')->where('product_id',$product->id)->get();
        $sizes=size::orderBy('id','desc')->where('id','!=',1)->get();;
        return view('admin.add-size-to-product',compact('product','product_images','product_sizes','sizes'));
    }

    public function store_size(Request $request)
    {
        //validation
        $this->validate($request,[
            'qty'=>'required'
        ]);
        //chick if number of product colors is < product qty
        $product=product::findOrFail($request->input('product_id'));
        $product_sizes=product_sizes::where('product_id',$request->input('product_id'))->get();
        $prod_size_qty=0;
        foreach($product_sizes as $prod_size)
        {
          $prod_size_qty+=$prod_size->qty;  
        }
        if($request->input('qty') > $product->qty || $request->input('qty') > ($product->qty -$prod_size_qty) )
        {
            //alert message the inter qty > product qty
            Alert::error('إضافة مقاس', 'لم يتم إضافة المقاس. كمية المنتج في المخزن أقل من عدد المنتجات بهذا المقاس  .');
            //return back
            return redirect()->back();
        }       
        // chick if this size unique for this product
        $exist_size=product_sizes::where('product_id',$request->input('product_id'))->where('size_id',$request->input('size_id'))->get();
        if($exist_size->count() > 0 || $request->input('size_id')==0 )
        {
            //unsuccess Alert
            Alert::error('إضافة مقاس', 'لم يتم إضافة المقاس. حدث خطأ ما.');
            //redirect back
            return redirect()->back();
        }
        else
        {
        //store color for this product
            $product_size=new product_sizes;
            $product_size->user_id=$request->input('user_id');
            $product_size->product_id=$request->input('product_id');
            $product_size->size_id=$request->input('size_id');
            $product_size->qty=$request->input('qty');        
        $product_size->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة المقاس '.$product_size->name.' للمنتج '.$product_size->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.sizes');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //success Alert
        Alert::success('إضافة مقاس', 'تم إضافة المقاس بنجاح');
        //redirecte
        return redirect()->back();
       }

    }

    public function edit_size($id)
    { 
        $prod_size=product_sizes::findOrFail($id);      
        $product=product::findOrFail($prod_size->product_id);
        $product_images=Product_Images::orderBy('id','desc')->where('product_id',$product->id)->get();
        $product_sizes=product_sizes::orderBy('id','desc')->where('product_id',$product->id)->get();
        $sizes=size::all();
        return view('admin.edit-size-to-product',compact('product','product_images','product_sizes','sizes','prod_size'));
    }

    public function update_size(Request $request)
    {
        //validation
        $this->validate($request,[
            'qty'=>'required'
        ]);
        //chick if number of product colors is < product qty
        $product=product::findOrFail($request->input('product_id'));
        $product_sizes=product_sizes::where('product_id',$request->input('product_id'))->get();
        $prod_size_qty=0;
        foreach($product_sizes as $prod_size)
        {
          $prod_size_qty+=$prod_size->qty;  
        }
        if($request->input('qty') > $product->qty )
        {
            //alert message the inter qty > product qty
            Alert::error('إضافة مقاس', 'لم يتم إضافة المقاس. كمية المنتج في المخزن أقل من عدد المنتجات بهذا المقاس  .');
            //return back
            return redirect()->back();
        }       
        // chick if this size unique for this product
        $exist_size=product_sizes::where('product_id',$request->input('product_id'))->where('size_id',$request->input('size_id'))->get();
        if($request->input('size_id')==0 )
        {
            //unsuccess Alert
            Alert::error('إضافة مقاس', 'لم يتم تعديل المقاس. حدث خطأ ما.');
            //redirect back
            return redirect()->back();
        }
        else
        {
        //store color for this product
            $product_size=product_sizes::findOrFail($request->input('product_size_id'));
            $product_size->user_id=$request->input('user_id');
            $product_size->product_id=$request->input('product_id');
            $product_size->size_id=$request->input('size_id');
            $product_size->qty=$request->input('qty');        
        $product_size->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل المقاس '.$product_size->name.' للمنتج '.$product_size->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.sizes');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //success Alert
        Alert::success('تعديل مقاس', 'تم تعديل المقاس بنجاح');
        //redirecte
        return redirect()->back();
       }
    }

    public function delete_product_size($id)
    {
        $product_size=product_sizes::findOrFail($id);        
        //delete data
        $product_size->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف المقاس '.$product_size->name.' للمنتج '.$product_size->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.sizes');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //redirect
        //return redirect()->back();
    }

    //=============start video functions ======
    public function add_videos($id)
    {    
        $product=product::findOrFail($id);
        $product_videos=product_videos::orderBy('id','desc')->where('product_id',$product->id)->get();
        //$product_colors=product_colors::orderBy('id','desc')->where('product_id',$product->id)->get();        
        return view('admin.add-videos-to-product',compact('product','product_videos'));
    }

    public function store_video(Request $request)
    {
        //validation
        $this->validate($request,[
            'video_link'=>'required'
        ]);
      //store video for this product
          $product_video=new product_videos;
          $product_video->user_id=$request->input('user_id');
          $product_video->product_id=$request->input('product_id');
          $product_video->video_url=$request->input('video_link');          
          $product_video->save();
          //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة فيديو '.$product_video->video_url.' للمنتج '.$product_video->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
          //success Alert
          Alert::success('إضافة فيديو', 'تم إضافة الفيديو بنجاح');                  
         //redirecte
         return redirect()->back();
 } 
  
 public function edit_video($id)
 {
    $prod_video=product_videos::findOrfail($id);
    $product=product::findOrFail($prod_video->product_id);
    $product_videos=Product_videos::orderBy('id','desc')->where('product_id',$product->id)->get();
    // $product_colors=product_colors::orderBy('id','desc')->where('product_id',$product->id)->get();        
    return view('admin.edit-videos-to-product',compact('product','product_videos','prod_video'));
 }

 public function update_video(Request $request)
 {  
          //validation
          $this->validate($request,[
              'video_link' => 'required'
          ]);
          //insert into database;
          $product_video=product_videos::findOrFail($request->input('product_video_id'));          
          $product_video->user_id=$request->input('user_id');
          $product_video->product_id=$request->input('product_id');            
          $product_video->video_url=$request->input('video_link');
          $product_video->update();
          //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل الفيديو '.$product_video->video_url.' للمنتج '.$product_video->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
          //success Alert
          Alert::success('تعديل فيديو', 'تم تعديل الفيديو بنجاح');                    
          //redirecte
          return redirect()->back();
     
 }

 public function delete_video($id)
 {
    $product_video=product_videos::findOrFail($id);
        $product_id=$product_video->product_id;
        //delete data
        $product_video->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف الفيديو '.$product_video->video_url.' للمنتج '.$product_video->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //redirect
        return redirect(route('admin.product.add.videos',$product_id));
 }
    //============end video functions

    public function add_images($id)
    {    
        $product=product::findOrFail($id);
        $product_images=Product_Images::orderBy('id','desc')->where('product_id',$product->id)->get();
        $product_colors=product_colors::orderBy('id','desc')->where('product_id',$product->id)->get();        
        return view('admin.add-images-to-product',compact('product','product_images','product_colors'));
    }

    public function store_image(Request $request)
    {
      //store color for this product
  //store image for this product
  //upload image
  if($file=$request->file('image'))
  {    
      $extention=$request->file('image')->getClientOriginalExtension();
      $imagename=time().'.'.$extention;
      if($file->move('admin-css/uploads/images/products/small/',$imagename))
      {
          //insert into database;
          $product_image=new Product_Images;
          $product_image->user_id=$request->input('user_id');
          $product_image->product_id=$request->input('product_id');            
          $product_image->image=$imagename;
          $product_image->save();
          //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة الصورة '.$product_image->image.' للمنتج '.$product_image->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
          //success Alert
          Alert::success('إضافة صورة', 'تم إضافة الصورة بنجاح');
      }else
      {
        //success Alert
        Alert::error('إضافة صورة', 'لم يتم إضافة الصورة ');  
      }

  }                    
  //redirecte
  return redirect()->back();
 } 
  
 public function edit_image($id)
 {
    $prod_image=Product_Images::findOrfail($id);
    $product=product::findOrFail($prod_image->product_id);
    $product_images=Product_Images::orderBy('id','desc')->where('product_id',$product->id)->get();
    $product_colors=product_colors::orderBy('id','desc')->where('product_id',$product->id)->get();        
    return view('admin.edit-images-to-product',compact('product','product_images','product_colors','prod_image'));
 }

 public function update_image(Request $request)
 {  
  //upload image
  if($file=$request->file('image'))
  { 
      //delete old image
      $product_image=Product_Images::findOrFail($request->input('product_image_id'));
      $old_image=$product_image->image;
      if(\File::exists(public_path('admin-css/uploads/images/products/small/'.$old_image)))
      {
        \File::delete(public_path('admin-css/uploads/images/products/small/'.$old_image));
      }
      $extention=$request->file('image')->getClientOriginalExtension();
      $imagename=time().'.'.$extention;
      if($file->move('admin-css/uploads/images/products/small/',$imagename))
      {
          //insert into database;          
          $product_image->user_id=$request->input('user_id');
          $product_image->product_id=$request->input('product_id');            
          $product_image->image=$imagename;
          $product_image->update();
          //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل الصورة '.$product_image->image.' للمنتج '.$product_image->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
          //success Alert
          Alert::success('تعديل صورة', 'تم تعديل الصورة بنجاح');
      }else
      {
        //success Alert
        Alert::error('تعديل صورة', 'لم يتم تعديل الصورة ');  
      }

  }                    
  //redirecte
  return redirect()->back();
     
 }

 public function delete_image($id)
 {
    $product_image=Product_Images::findOrFail($id);
        //delete image
        $p_image=$product_image->image;
        $product_id=$product_image->product_id;
        if(\File::exists(public_path('admin-css/uploads/images/products/small/'.$p_image)))
        {
            \File::delete(public_path('admin-css/uploads/images/products/small/'.$p_image));
        }
        //delete data
        $product_image->delete();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف الصورة '.$product_image->image.' للمنتج '.$product_image->product->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.products');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //redirect
        return redirect(route('admin.product.add.images',$product_id));
 }

 public function product_details($id)
 {
    $product=product::findOrfail($id);
    $reviews=reating::where('product_id',$product->id)->paginate(5);
    return view('admin.inc.products.product-details',compact('product','reviews'));
 }
  public function generate_slug_for_all_products()
  {
      $products=product::all();
      foreach($products as $product)
      {
        $pro_data=product::find($product->id);
        $pro_data->slug=make_slug($product->name);
        $pro_data->update();
      }
      //success alert
      Alert::success('رائع','تم إنشاء slug لجميع المنتجات.');
      //redirect
      return redirect()->back();
  }

  public function change_product_statu($id)
  {
      //get product statu
        $product=product::findOrFail($id);
      //change product status
      if($product->statu==1)
      {
          $product->statu=0;
          $product->update();
      }
      else
      {
        $product->statu=1;
          $product->update();
      }

      //redirect back
      return redirect()->back();
  }
}
