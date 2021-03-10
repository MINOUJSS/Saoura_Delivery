<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\product;
use App\category;
use App\Sub_Category;
use App\Sub_Sub_Category;
use App\reating;
use App\color;
use App\size;
use App\brand;
use App\product_colors;
use App\product_sizes;
use App\Store_Model\Cart;
use App\Store_Model\Searcher;

class ProductController extends Controller
{
    public function index()
    {      
        //destroy searcher session
        // if(session()->has('searcher'))
        // {
        //     session()->forget('searcher');
        // }  
        //
        $colors=color::all();
        foreach($colors as $color)
        {
            $colors_ids[]=$color->id;
        }    
        $sizes=size::all();
        foreach($sizes as $size)
        {
            $sizes_ids[]=$size->id;
        }
        $brands=brand::all();
        $min_price=product::orderBy('selling_price')->first()->selling_price;
        $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        if(session()->has('searcher'))
        {
            //if has color only
if(count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['min_price']==0 && session()->get('searcher')->query['max_price']==0)
{
    $query=product_colors::join('products','product_colors.product_id','products.id');
    foreach(session()->get('searcher')->query['colors'] as $color_id)
    {
       $query->orwhere('color_id',$color_id);
    }        
}
//dd($products);
        //if has size only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['min_price']==0 && session()->get('searcher')->query['max_price']==0)
        {
            $query=product_sizes::join('products','product_sizes.product_id','products.id');
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
               $query->orwhere('size_id',$size_id);
            }        
        }
        //if has brands only
        elseif(count(session()->get('searcher')->query['brands'])>0 && count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && session()->get('searcher')->query['min_price']==0 && session()->get('searcher')->query['max_price']==0)
        {            
            $query=product::orderBy('id','desc');
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
               $query->orwhere('brand_id',$brand_id);
            }             
        }        
        // if has min_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['min_price']!=0 && session()->get('searcher')->query['max_price']==0)
        { 
            $min_price=session()->get('searcher')->query['min_price'];         
            $query=product::orderBy('id','desc')->where('selling_price','>=',$min_price);                         
        }        
        //if has max_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=session()->get('searcher')->query['max_price'];         
            $query=product::orderBy('id','desc')->where('selling_price','<=',$max_price);                         
        }
        //if has min and max price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=session()->get('searcher')->query['min_price'];
            $max_price=session()->get('searcher')->query['max_price'];
            $query=product::orderBy('id','desc')->whereBetween('selling_price',[$min_price,$max_price]);
        }
        //if has colors and size only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_colors::join('product_sizes','product_sizes.product_id','product_colors.product_id');
            $query->join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
               $query->orwhere('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
               $query->orwhere('size_id',$size_id);
            }
        }        
        // if has colors and brands only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_colors::join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
               $query->where('color_id',$color_id);
                foreach(session()->get('searcher')->query['brands'] as $brand_id)
                {
                $query->where('brand_id',$brand_id);
                }
            }
            
        }        

        //if has colors and min_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=session()->get('searcher')->query['min_price'];
            $query=product_colors::join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            $query->where('selling_price','>=',$min_price);
        }    
        //if has colors and max_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=session()->get('searcher')->query['max_price'];
            $query=product_colors::join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            $query->where('selling_price','<=',$max_price);
        }
        //if has colors and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);            
            $query=product_colors::join('products','product_colors.product_id','products.id');                        
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }            
            
        }
        //if has colors and sizes and brands only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            } 
        }
        //if has colors and size and min_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }
                $query->where('selling_price','>=',$min_price);
        }
        //if has colors and size and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            // dd($query->get());
            foreach(session()->get('searcher')->query['colors'] as $color_id)            
            {
                $query->where('color_id',$color_id);
            }            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }            
            $query->where('selling_price','<=',$max_price);                                
        }
        //if has colors and size and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            // dd($query->get());
            foreach(session()->get('searcher')->query['colors'] as $color_id)            
            {
                $query->where('color_id',$color_id);
            }            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }            
            $query->whereBetween('selling_price',[$min_price,$max_price]);                                
        }
        //if has colors and size and brand and min_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                
            $query->orwhere('selling_price','>=',$min_price);
        }
        //if has colors and size and brand and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                
            $query->orwhere('selling_price','<=',$max_price);
        }
        //if has colors and size and brand and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);
        }
        //if has size and brand only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_sizes::join('products','product_sizes.product_id','products.id');
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->orwhere('brand_id',$brand_id);
            }                
        }
        //if has size and brand and min_price only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $query=product_sizes::join('products','product_sizes.product_id','products.id');
            $query->where('selling_price','>=',$min_price);
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                           
        }
        //if has size and brand and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        {
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_sizes::join('products','product_sizes.product_id','products.id');            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }                        
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }            
            $query->orwhere('selling_price','<=',$max_price);                                                   
        }
        //if has size and brand and min_price and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_sizes::join('products','product_sizes.product_id','products.id');            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }                        
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);                                                   
        }
        //if has  brand and min price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);            
            $query=product::orderBy('id','desc');                                    
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhere('selling_price','>=',$min_price);                                                   
        }
        //if has brand and max price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        {
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product::orderBy('id','desc');                                    
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhere('selling_price','<=',$max_price);                                                   
        }
        //if has brand and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product::orderBy('id','desc');                                    
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);                                                   
        }
        //if has min and max price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product::orderBy('id','desc');                                                
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);                                                   
        }
        //else
        else
        {
            $query=product::orderBy('id','desc');
        } 
        
        $products=$query->paginate(12);
        }else{
        $products=product::OrderBy('id','desc')->paginate(12);                
        }
        return view('store.products',compact('products','min_price','max_price','colors','sizes','brands')); 
    }

    public function product($id)
    {
        $product=product::findOrfail($id);
        $reviews=reating::where('product_id',$product->id)->paginate(5);
        return view('store.product-page',compact('product','reviews'));
    }

    public function addToCart(product $product)
    {
        if(session()->has('cart'))
        {
            $cart=new Cart(session()->get('cart'));
        }
        else
        {
            $cart=new Cart();
        }
        $cart->add($product);
        session()->put('cart',$cart);
         //dd($cart);
        return redirect()->back();

    }

    public function addWithQty(Request $request,product $product)
    {
        $this->validate($request,[
            'qty' => 'required|numeric|min:1'
        ]);

        if(session()->has('cart'))
        {
            $cart=new Cart(session()->get('cart'));
        }
        else
        {
            $cart=new Cart();
        }
        $cart->addWithQty($product,$request->qty,$request->color_id,$request->size_id);                
        session()->put('cart',$cart);        
        //dd($cart);
        return redirect()->back();

    }

    public function removeFromCart(product $product)
    {
        $cart=new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if($cart->totalQty <= 0)
        {
            session()->forget('cart');
        }
        else
        {
            session()->put('cart',$cart);
        }

        return redirect()->back();
    }

    public function updateQty(Request $request,product $product) 
    {
        $this->validate($request,[
            'qty' => 'required|numeric|min:1'
        ]);

        $cart=new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty,$request->color_id,$request->size_id);
        session()->put('cart',$cart);
        //dd($cart);
        return redirect()->back();
    }

    public function showCart()
    {
        return view('store.cart');
    }

    public function products_by_category($name)
    {
        $category=category::where('name',$name)->first();        
        $colors=color::all();
        $sizes=size::all();
        $brands=brand::all();
        $min_price=product::orderBy('selling_price')->first()->selling_price;
        $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        $products=product::OrderBy('id','desc')->where('category_id',$category->id)->paginate(12);
        return view('store.products',compact('products','colors','sizes','brands','min_price','max_price')); 
    }

    public function products_by_sub_category($name)
    {
        $sub_category=Sub_Category::where('name',$name)->first();        
        $colors=color::all();
        $sizes=size::all();
        $brands=brand::all();
        $min_price=product::orderBy('selling_price')->first()->selling_price;
        $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        $products=product::OrderBy('id','desc')->where('sub_category_id',$sub_category->id)->paginate(12);
        return view('store.products',compact('products','colors','sizes','brands','min_price','max_price')); 
    }

    public function products_by_sub_sub_category($name)
    {
        $sub_sub_category=Sub_Sub_Category::where('name',$name)->first();        
        $colors=color::all();
        $sizes=size::all();
        $brands=brand::all();
        $min_price=product::orderBy('selling_price')->first()->selling_price;
        $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        $products=product::OrderBy('id','desc')->where('sub_category_id',$sub_sub_category->id)->paginate(12);
        return view('store.products',compact('products','colors','sizes','brands','min_price','max_price')); 
    }

    // public function shop_bay_result()
    // {
    //     if(session()->has('searcher'))
    //     {            
    //         if(count(session()->get('searcher')->query['colors'])!=0)
    //         {
    //             foreach(session()->get('searcher')->query['colors'] as $color_id)
    //             {
    //                 $product_color=product_colors::find($color_id);
    //                 $p_c[]=$product_color->product;
    //                 if($product_color!=null){
    //                     $pro_id_o_s_c[]=$product_color->product_id;
    //                 }else
    //                 {
    //                     $p_c[]=null;
    //                     $pro_id_o_s_c[]=null; 
    //                 }
    //             }
    //         }else
    //         {
    //             $p_c[]=null;
    //             $pro_id_o_s_c[]=null;
    //         }
    //         if(count(session()->get('searcher')->query['sizes'])!=0)
    //         {
    //             foreach(session()->get('searcher')->query['sizes'] as $size_id)
    //             {
    //                 $product_size=product_sizes::find($size_id);
    //                 $p_s[]=$product_size->product;
    //                 if($product_size!=null){
    //                 $pro_id_o_s_s[]=$product_size->product_id;
    //             }else
    //             {
    //                 $p_s[]=null;
    //                 $pro_id_o_s_s[]=null; 
    //             }
    //             }
    //         }else
    //         {
    //             $p_s[]=null;
    //             $pro_id_o_s_s[]=null;
    //         }
    //         //
    //         if(count(session()->get('searcher')->query['brands'])!=0)
    //         {
    //             foreach(session()->get('searcher')->query['brands'] as $brand_id)
    //             {
    //                 $product_brands=product::where('brand_id',$brand_id)->get();
                    
    //                 if(count($product_brands)!=0){
    //                     foreach($product_brands as $prod)
    //                     {
    //                         $p_b[]=$prod;
    //                         $pro_id_o_s_b[]=$prod->id;
    //                     }                    
                    
    //             }else
    //             {
    //                 $p_b[]=null;
    //                 $pro_id_o_s_b[]=null; 
    //             }
    //          }
    //         }else
    //         {
    //             $p_b[]=null;
    //             $pro_id_o_s_b[]=null;
    //         }
    //         //
    //         if(session()->get('searcher')->query['min_price']!=0 && session()->get('searcher')->query['max_price']==0)
    //         {                      
    //                 $pro_min_max=product::where('selling_price','>=',session()->get('searcher')->query['min_price'])->get();
    //                 foreach($pro_min_max as $prod)
    //                 {
    //                     $p_m_m[]=$prod;
    //                     $pro_id_b_m_m_p[]=$prod->id;
    //                 }                    
    //         }elseif(session()->get('searcher')->query['min_price']==0 && session()->get('searcher')->query['max_price']!=0)
    //         {
    //                 $pro_min_max=product::where('selling_price','<=',session()->get('searcher')->query['max_price'])->get();
    //                 foreach($pro_min_max as $prod)
    //                 {
    //                     $p_m_m[]=$prod;
    //                     $pro_id_b_m_m_p[]=$prod->id;
    //                 }
    //         }elseif(session()->get('searcher')->query['min_price']!=0 && session()->get('searcher')->query['max_price']!=0)
    //         {
    //             $pro_min_max=product::whereBetween('selling_price',[session()->get('searcher')->query['min_price'],session()->get('searcher')->query['max_price']])->get();                
    //                 foreach($pro_min_max as $prod)
    //                 {
    //                     $p_m_m[]=$prod;
    //                     $pro_id_b_m_m_p[]=$prod->id;
    //                 }                
    //         }else
    //         {
    //             $p_m_m[]=null;
    //             $pro_id_b_m_m_p[]=null;                  
    //         } 
    //         $null_array[]=null;        
    //         $prod_ids_array=array_unique(array_merge($p_c,$p_s,$p_b,$p_m_m));
    //         if(in_array(null,$prod_ids_array))
    //         {
    //             $new_prod_ids=array_diff($prod_ids_array,$null_array);
    //         }else
    //         {
    //             $new_prod_ids=$prod_ids_array; 
    //         } 
    //         //dd($new_prod_ids);
    //         $products=$new_prod_ids;
    //         // foreach($new_prod_ids as $id)
    //         // {
    //         //     $products[]=product::findOrFail($id);
    //         // } 
            
    //         //
    //     }else
    //     {
    //         $products=product::orderBy('id','desc')->get();
    //     }
    //     //dd($products);
    //     $output='';
    //     if(count($products)>0){
    // foreach($products as $index => $product){
    // $output.='<!-- Product Single -->
    // <div class="col-md-4 col-sm-6 col-xs-6">
    //     <div class="product product-single">

    //         <div class="product-rating pull-left">
    //             <div name="products_ratings" data-rating="'.get_product_reating_from_id($product->id).'"></div>
    //             <div class="product-star-'.$index.' starrr"></div>
    //         </div>

    //         <div class="product-thumb">
    //             <div class="product-label">';
    //                 if(is_new_product($product->created_at)){
    //                 $output.='<span>جديد</span>';
    //                 }
    //                 if(has_discount($product->id)){
    //                 $output.='<span class="sale">- %'.$product->discount->discount.'</span>';
    //                 }
    //             $output.='</div>
    //             <a href="'.url("/product/".$product->id).'"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> إضغط للمشاهدة</button></a>                
    //             <img src="'.url('/admin-css/uploads/images/products/'.$product->image).'" alt="'.$product->name.'" height="350" width="262">
    //         </div>
    //         <div class="product-body"> 
    //             <h3 class="product-price">';if(has_discount($product->id)){ $output.=price_with_discount($product->selling_price,get_product_discount($product->id)).' د.ج <del class="product-old-price">'.$product->selling_price.' د.ج </del>';}else{ $output.=$product->selling_price.' د.ج ';}$output.='</h3>';
                
    //         $output.='<h2 class="product-name"><a href="#">'.substr($product->name,0,20).'</a></h2>
    //             <div class="product-btns">
    //                 <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
    //                 <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
    //                 <a href="'.route('cart.add',$product->id).'"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> أضف للسلة</button></a>
    //             </div>
    //         </div>
    //     </div>
    // </div>
    // <!-- /Product Single -->
    // <div class="clearfix visible-sm visible-xs"></div>';
    //     }
    //     }else{ 
    // $output.='<p class="text-danger text-center"><i class="fa fa-frown-o fa-2x"></i> لا توجد منتجات بالمتجر!</p>';
    //     }

    //     return $output;
    // }

    public function shop_bay_result()
    {       
        //if has color only
if(count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['min_price']==0 && session()->get('searcher')->query['max_price']==0)
{
    $query=product_colors::join('products','product_colors.product_id','products.id');
    foreach(session()->get('searcher')->query['colors'] as $color_id)
    {
       $query->orwhere('color_id',$color_id);
    }        
}
//dd($products);
        //if has size only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['min_price']==0 && session()->get('searcher')->query['max_price']==0)
        {
            $query=product_sizes::join('products','product_sizes.product_id','products.id');
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
               $query->orwhere('size_id',$size_id);
            }        
        }
        //if has brands only
        elseif(count(session()->get('searcher')->query['brands'])>0 && count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && session()->get('searcher')->query['min_price']==0 && session()->get('searcher')->query['max_price']==0)
        {            
            $query=product::orderBy('id','desc');
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
               $query->orwhere('brand_id',$brand_id);
            }             
        }        
        // if has min_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['min_price']!=0 && session()->get('searcher')->query['max_price']==0)
        { 
            $min_price=session()->get('searcher')->query['min_price'];         
            $query=product::orderBy('id','desc')->where('selling_price','>=',$min_price);                         
        }        
        //if has max_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=session()->get('searcher')->query['max_price'];         
            $query=product::orderBy('id','desc')->where('selling_price','<=',$max_price);                         
        }
        //if has min and max price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=session()->get('searcher')->query['min_price'];
            $max_price=session()->get('searcher')->query['max_price'];
            $query=product::orderBy('id','desc')->whereBetween('selling_price',[$min_price,$max_price]);
        }
        //if has colors and size only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_colors::join('product_sizes','product_sizes.product_id','product_colors.product_id');
            $query->join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
               $query->orwhere('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
               $query->orwhere('size_id',$size_id);
            }
        }        
        // if has colors and brands only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_colors::join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
               $query->where('color_id',$color_id);
                foreach(session()->get('searcher')->query['brands'] as $brand_id)
                {
                $query->where('brand_id',$brand_id);
                }
            }
            
        }        

        //if has colors and min_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=session()->get('searcher')->query['min_price'];
            $query=product_colors::join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            $query->where('selling_price','>=',$min_price);
        }    
        //if has colors and max_price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=session()->get('searcher')->query['max_price'];
            $query=product_colors::join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            $query->where('selling_price','<=',$max_price);
        }
        //if has colors and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);            
            $query=product_colors::join('products','product_colors.product_id','products.id');                        
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }            
            
        }
        //if has colors and sizes and brands only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            } 
        }
        //if has colors and size and min_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->orwhere('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }
                $query->where('selling_price','>=',$min_price);
        }
        //if has colors and size and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            // dd($query->get());
            foreach(session()->get('searcher')->query['colors'] as $color_id)            
            {
                $query->where('color_id',$color_id);
            }            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }            
            $query->where('selling_price','<=',$max_price);                                
        }
        //if has colors and size and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])==0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            // dd($query->get());
            foreach(session()->get('searcher')->query['colors'] as $color_id)            
            {
                $query->where('color_id',$color_id);
            }            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }            
            $query->whereBetween('selling_price',[$min_price,$max_price]);                                
        }
        //if has colors and size and brand and min_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                
            $query->orwhere('selling_price','>=',$min_price);
        }
        //if has colors and size and brand and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        { 
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                
            $query->orwhere('selling_price','<=',$max_price);
        }
        //if has colors and size and brand and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])>0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        { 
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_colors::join('product_sizes','product_colors.product_id','product_sizes.product_id');                        
            $query->join('products','product_colors.product_id','products.id');                        
            foreach(session()->get('searcher')->query['colors'] as $color_id)
            {
                $query->where('color_id',$color_id);
            }
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);
        }
        //if has size and brand only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']==0)
        { 
            $query=product_sizes::join('products','product_sizes.product_id','products.id');
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->orwhere('brand_id',$brand_id);
            }                
        }
        //if has size and brand and min_price only
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $query=product_sizes::join('products','product_sizes.product_id','products.id');
            $query->where('selling_price','>=',$min_price);
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->orwhere('size_id',$size_id);
            }
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }                           
        }
        //if has size and brand and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        {
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_sizes::join('products','product_sizes.product_id','products.id');            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }                        
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }            
            $query->orwhere('selling_price','<=',$max_price);                                                   
        }
        //if has size and brand and min_price and max_price
        elseif(count(session()->get('searcher')->query['sizes'])>0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product_sizes::join('products','product_sizes.product_id','products.id');            
            foreach(session()->get('searcher')->query['sizes'] as $size_id)
            {
                $query->where('size_id',$size_id);
            }                        
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);                                                   
        }
        //if has  brand and min price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']==0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);            
            $query=product::orderBy('id','desc');                                    
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhere('selling_price','>=',$min_price);                                                   
        }
        //if has brand and max price only
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']==0)
        {
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product::orderBy('id','desc');                                    
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhere('selling_price','<=',$max_price);                                                   
        }
        //if has brand and min and max_price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product::orderBy('id','desc');                                    
            foreach(session()->get('searcher')->query['brands'] as $brand_id)
            {
                $query->where('brand_id',$brand_id);
            }           
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);                                                   
        }
        //if has min and max price
        elseif(count(session()->get('searcher')->query['sizes'])==0 && count(session()->get('searcher')->query['colors'])==0 && count(session()->get('searcher')->query['brands'])>0 && session()->get('searcher')->query['max_price']!=0 && session()->get('searcher')->query['min_price']!=0)
        {
            $min_price=sprintf("%.2f",session()->get('searcher')->query['min_price']);
            $max_price=sprintf("%.2f",session()->get('searcher')->query['max_price']);
            $query=product::orderBy('id','desc');                                                
            $query->orwhereBetween('selling_price',[$min_price,$max_price]);                                                   
        }
        //else
        else
        {
            $query=product::orderBy('id','desc');
        } 
        
        $products=$query->paginate(12);
        //dd($products);        
        $output='';
        if(count($products)>0){
    foreach($products as $index => $product){        
    $output.='<!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">

            <div class="product-rating pull-left">
                <div name="products_ratings_b" data-rating="'.get_product_reating_from_id($product->id).'"></div>
                <div class="product-star-'.$index.' starrr"></div>
            </div>

            <div class="product-thumb">
                <div class="product-label">';
                    if(is_new_product($product->created_at)){
                    $output.='<span>جديد</span>';
                    }
                    if(has_discount($product->id)){
                    $output.='<span class="sale">- %'.$product->discount->discount.'</span>';
                    }
                $output.='</div>
                <a href="'.url("/product/".$product->id).'"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> إضغط للمشاهدة</button></a>                
                <img src="'.url('/admin-css/uploads/images/products/'.$product->image).'" alt="'.$product->name.'" height="350" width="262">
            </div>
            <div class="product-body"> 
                <h3 class="product-price">';if(has_discount($product->id)){ $output.=price_with_discount($product->selling_price,get_product_discount($product->id)).' د.ج <del class="product-old-price">'.$product->selling_price.' د.ج </del>';}else{ $output.=$product->selling_price.' د.ج ';}$output.='</h3>';
                
            $output.='<h2 class="product-name"><a href="#">'.substr($product->name,0,20).'</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <a href="'.route('cart.add',$product->id).'"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> أضف للسلة</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->
    <div class="clearfix visible-sm visible-xs"></div>';
        }
        }else{ 
    $output.='<p class="text-danger text-center"><i class="fa fa-frown-o fa-2x"></i> لا توجد منتجات بالمتجر!</p>';
        }

        return [$output,$products];
    }
    

}