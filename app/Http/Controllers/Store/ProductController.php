<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
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
use App\Product_Category;
use App\Product_Sub_Category;
use App\Product_Sub_Sub_Category;
use App\Store_Model\Cart;
use App\Store_Model\Searcher;
use App\searsh_word;
use App\up_sale;
use Auth;
class ProductController extends Controller
{
    public function index()
    { 
        $title='منتجاتنا';     
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
        $all_pro=product::all();
        if(count($all_pro)>0)
        {
            $min_price=product::orderBy('selling_price')->first()->selling_price;
            $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        }else
        {
            $min_price=0;
            $max_price=100;
        }      
        //        
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
        
        $products=$query->where('statu',1)->where('qty','!=',0)->paginate(12);
        }else{
        $products=product::OrderBy('id','desc')->where('statu',1)->where('qty','!=',0)->paginate(12);                
        // $products=product::inRandomOrder()->where('statu',1)->where('qty','!=',0)->paginate(12);                
        }
        return view('store.products',compact('title','products','min_price','max_price','colors','sizes','brands')); 
    }

    public function quick_order($slug)
    {
        $title="طلب-سريع|".$slug;
        $product=product::where('slug',$slug)->first();
        if($product!=null)
        {
            if($product->statu==0 or $product->qty==0)
            {
                //return to not found page
                // return redirect()->back();
                return redirect(route('store.qty_zero',$product->id));
            }
        

        $piked_products=product::inRandomOrder()->where('statu',1)->where('qty','!=',0)->paginate(4);
        $similar_products_list=up_sale::where('first_product_id',$product->id)->where('type',1)->get();
        $similar_products_ids=array();
        foreach($similar_products_list as $list)
        {
            $similar_products_ids[]=$list->second_product_id;
        }
       //dd($similar_products_ids);
        $similar_products=product::inRandomOrder()->whereIn('id',$similar_products_ids)->paginate(4);
        //dd($similar_products);
        $accessories_products_list=up_sale::orderBy('id','desc')->where('first_product_id',$product->id)->where('type',2)->get();
        $accessories_products_ids=array();
        foreach($accessories_products_list as $list)
        {
            $accessories_products_ids[]=$list->second_product_id;
        }
        $accessories_products=product::inRandomOrder()->whereIn('id',$accessories_products_ids)->paginate(4);
        if($product != null)
        {
        $reviews=reating::where('product_id',$product->id)->where('visible',1)->paginate(5);
        return view('store.quick-order',compact('product','reviews','piked_products','title','similar_products','accessories_products'));
        }else
        {
            $product=product::findOrfail(0);
        }

    }else
    {
        return redirect(route('store.product_not_found'));
    }
    }
    public function product($slug)
    {
        $title=$slug;
        $product=product::where('slug',$slug)->first();
        if($product!=null)
        {
            if($product->statu==0 or $product->qty==0)
            {
                //return to not found page
                // return redirect()->back();
                return redirect(route('store.qty_zero',$product->id));
            }
        

        $piked_products=product::inRandomOrder()->where('statu',1)->where('qty','!=',0)->paginate(4);
        $similar_products_list=up_sale::where('first_product_id',$product->id)->where('type',1)->get();
        $similar_products_ids=array();
        foreach($similar_products_list as $list)
        {
            $similar_products_ids[]=$list->second_product_id;
        }
       //dd($similar_products_ids);
        $similar_products=product::inRandomOrder()->whereIn('id',$similar_products_ids)->paginate(4);
        //dd($similar_products);
        $accessories_products_list=up_sale::orderBy('id','desc')->where('first_product_id',$product->id)->where('type',2)->get();
        $accessories_products_ids=array();
        foreach($accessories_products_list as $list)
        {
            $accessories_products_ids[]=$list->second_product_id;
        }
        $accessories_products=product::inRandomOrder()->whereIn('id',$accessories_products_ids)->paginate(4);
        if($product != null)
        {
        $reviews=reating::where('product_id',$product->id)->where('visible',1)->paginate(5);
        return view('store.product-page',compact('product','reviews','piked_products','title','similar_products','accessories_products'));
        }else
        {
            $product=product::findOrfail(0);
        }

    }else
    {
        return redirect(route('store.product_not_found'));
    }
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
        //return redirect()->back();
        //start output    
        $output='<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>';
                                $totalQty=session()->has('cart')?session()->get('cart')->totalQty:'0';
                                $output.='<span class="qty">'.$totalQty.'</span>
                            </div>
                            <strong class="text-uppercase">السلة:</strong>
                            <br>';
                            $totalPrice=session()->has('cart')?session()->get('cart')->totalPrice:'0.00';
                            $output.='<span>'.$totalPrice.' دج</span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">';
                                    if(session()->has('cart'))
                                    {
                                    foreach(session()->get('cart')->items as $item)
                                    {
                                    $output.='<div class="product product-widget">
                                        <div class="product-thumb">';
                                        $image=url('admin-css/uploads/images/products/'.$item['image']);
                                            $output.='<img src="'.$image.'" alt="">
                                        </div>
                                        <div class="product-body">';
                                        $price=$item['price'];
                                        $qty=$item['qty'];
                                        $titel=$item['title'];
                                        $url=url('product/'.$item['id']);
                                           $output.='<h3 class="product-price">'.$price.' دج<span class="qty"> الكمية:'.$qty.'</span></h3>';
                                            $output.='<h2 class="product-name"><a href="'.$url.'">'.$titel.'</a></h2>
                                        </div>';
                                        $route=route('cart.remove',$item['id']);
                                        $output.='<a href="'.$route.'"><button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                                    </div>';
                                    }
                                    }
                                    else
                                    { 
                                   $output.='<div class="product product-widget">
                                   السلة فارغة     
                                    </div>';           
                                    }                                    
                                $output.='</div>';
                                if(session()->has('cart'))
                                {
                                $output.='<div class="shopping-cart-btns">';
                                $show_cart_route=route('cart.show');
                                $checkout_route=route('checkout');
                                    $output.='<a href="'.$show_cart_route.'"><button class="main-btn">عرض محتوى السلة</button></a>';
                                    $output.='<a href="'.$checkout_route.'"><button class="primary-btn"><i class="fa fa-arrow-circle-left"></i>  أطلب الآن</button></a>
                                </div>';
                                }
                            $output.='</div>
                        </div>';
        //end output       
        return $output;

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
        if($request->checkout=='checkout')
        {
            return redirect(route('checkout'));
        }else
        {
            return redirect()->back();
        }        

    }

    // public function addWithQtyToCheckout(Request $request,product $product)
    // {
    //     $this->validate($request,[
    //         'qty' => 'required|numeric|min:1'
    //     ]);

    //     if(session()->has('cart'))
    //     {
    //         $cart=new Cart(session()->get('cart'));
    //     }
    //     else
    //     {
    //         $cart=new Cart();
    //     }
    //     $cart->addWithQty($product,$request->qty,$request->color_id,$request->size_id);                
    //     session()->put('cart',$cart);        
    //     //dd($cart);
    //     return redirect(route('checkout'));

    // }

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
        if($request->checkout=='checkout')
        {
            return redirect(route('checkout'));
        }else
        {
            return redirect()->back();
        }        
    }

    public function updateQty_with_get_method(Request $request,product $product) 
    {
        $this->validate($request,[
            'qty' => 'required|numeric|min:1'
        ]);

        $cart=new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty,$request->color_id,$request->size_id);
        session()->put('cart',$cart);
        //dd($cart);
        $output='<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>';
                                $totalQty=session()->has('cart')?session()->get('cart')->totalQty:'0';
                                $output.='<span class="qty">'.$totalQty.'</span>
                            </div>
                            <strong class="text-uppercase">السلة:</strong>
                            <br>';
                            $totalPrice=session()->has('cart')?session()->get('cart')->totalPrice:'0.00';
                            $output.='<span>'.$totalPrice.' دج</span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">';
                                    if(session()->has('cart'))
                                    {
                                    foreach(session()->get('cart')->items as $item)
                                    {
                                    $output.='<div class="product product-widget">
                                        <div class="product-thumb">';
                                        $image=url('admin-css/uploads/images/products/'.$item['image']);
                                            $output.='<img src="'.$image.'" alt="">
                                        </div>
                                        <div class="product-body">';
                                        $price=$item['price'];
                                        $qty=$item['qty'];
                                        $titel=$item['title'];
                                        $url=url('product/'.$item['id']);
                                           $output.='<h3 class="product-price">'.$price.' دج<span class="qty"> الكمية:'.$qty.'</span></h3>';
                                            $output.='<h2 class="product-name"><a href="'.$url.'">'.$titel.'</a></h2>
                                        </div>';
                                        $route=route('cart.remove',$item['id']);
                                        $output.='<a href="'.$route.'"><button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                                    </div>';
                                    }
                                    }
                                    else
                                    { 
                                   $output.='<div class="product product-widget">
                                   السلة فارغة     
                                    </div>';           
                                    }                                    
                                $output.='</div>';
                                if(session()->has('cart'))
                                {
                                $output.='<div class="shopping-cart-btns">';
                                $show_cart_route=route('cart.show');
                                $checkout_route=route('checkout');
                                    $output.='<a href="'.$show_cart_route.'"><button class="main-btn">عرض محتوى السلة</button></a>';
                                    $output.='<a href="'.$checkout_route.'"><button class="primary-btn"><i class="fa fa-arrow-circle-left"></i>  أطلب الآن</button></a>
                                </div>';
                                }
                            $output.='</div>
                        </div>';
        //end output       
        return $output;
               
    }

    public function showCart()
    {
        $title='السلة';
        return view('store.cart',compact('title'));
    }

    public function products_by_category($slug)
    {
        $title='منتجاتنا|'.$slug;
        $category=category::where('slug',$slug)->first();        
        $colors=color::all();
        $sizes=size::all();
        $brands=brand::all();        
        $all_pro=product::all();
        if(count($all_pro)>0)
        {
            $min_price=product::orderBy('selling_price')->first()->selling_price;
            $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        }else
        {
            $min_price=0;
            $max_price=100;
        }
        //$products=product::OrderBy('id','desc')->where('category_id',$category->id)->paginate(12);
        $product_category=Product_Category::where('category_id',$category->id)->get();
        
        //get all $product_category product_id in array
        $p_c_product_id_array=[];
        if(count($product_category)>0)
        {
            foreach($product_category as $p_c)
            {
                $p_c_product_id_array[]=$p_c->product_id;
            }
                //dd($p_c_product_id_array);            
            $products=product::whereIn('id',$p_c_product_id_array)->where('statu',1)->where('qty','!=',0)->paginate(12);
        }else
        {
            $products=product::where('id',0)->where('statu',1)->where('qty','!=',0)->paginate(12);
        }
        //dd($products);
        return view('store.products',compact('title','products','colors','sizes','brands','min_price','max_price')); 
    }

    public function products_by_sub_category($slug)
    {
        $title='منتجاتنا|'.$slug;
        $sub_category=Sub_Category::where('slug',$slug)->first();        
        $colors=color::all();
        $sizes=size::all();
        $brands=brand::all();
        $all_pro=product::all();
        if(count($all_pro)>0)
        {
            $min_price=product::orderBy('selling_price')->first()->selling_price;
            $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        }else
        {
            $min_price=0;
            $max_price=100;
        } 
        //$products=product::OrderBy('id','desc')->where('sub_category_id',$sub_category->id)->paginate(12);
        $product_sub_category=Product_Sub_Category::where('sub_category_id',$sub_category->id)->get();
        //get all $product_category product_id in array
        $p_c_product_id_array=[];
        if(count($product_sub_category)>0)
        {
            foreach($product_sub_category as $p_s_c)
            {
                $p_s_c_product_id_array[]=$p_s_c->product_id;
            }
                //dd($p_c_product_id_array);            
            $products=product::whereIn('id',$p_s_c_product_id_array)->where('statu',1)->where('qty','!=',0)->paginate(12);
        }else
        {
            $products=product::where('id',0)->where('statu',1)->where('qty','!=',0)->paginate(12);
        }
        return view('store.products',compact('title','products','colors','sizes','brands','min_price','max_price')); 
    }

    public function products_by_sub_sub_category($slug)
    {
        $title='منتجاتنا|'.$slug;
        $sub_sub_category=Sub_Sub_Category::where('slug',$slug)->first();        
        $colors=color::all();
        $sizes=size::all();
        $brands=brand::all();
        $all_pro=product::all();
        if(count($all_pro)>0)
        {
            $min_price=product::orderBy('selling_price')->first()->selling_price;
            $max_price=product::orderBy('selling_price','desc')->first()->selling_price;        
        }else
        {
            $min_price=0;
            $max_price=100;
        } 
        //$products=product::OrderBy('id','desc')->where('sub_category_id',$sub_sub_category->id)->paginate(12);
        $product_sub_sub_category=Product_Sub_Sub_Category::where('sub_sub_category_id',$sub_sub_category->id)->get();
        //get all $product_category product_id in array
        $p_s_s_c_product_id_array=[];
        if(count($product_sub_sub_category)>0)
        {
            foreach($product_sub_sub_category as $p_s_s_c)
            {
                $p_s_s_c_product_id_array[]=$p_s_s_c->product_id;
            }
                //dd($p_c_product_id_array);            
            $products=product::whereIn('id',$p_s_s_c_product_id_array)->where('statu',1)->where('qty','!=',0)->paginate(12);
        }else
        {
            $products=product::where('id',0)->where('statu',1)->where('qty','!=',0)->paginate(12);
        }
        return view('store.products',compact('title','products','colors','sizes','brands','min_price','max_price')); 
    }

    public function find_products(Request $request)
    {
        //validation
        $this->validate($request,[
            'query'=>'required'
        ]);
        //get consumer id
            if(Auth::guard('consumer')->check() && Auth::guard('consumer')->user()->id != 1)
            {
                $consumer_id=Auth::guard('consumer')->user()->id;
            }
            else
            {
                $consumer_id=1;
            }
        //
        $query=$request->input('query');         
        //insert query in search word table
        $search_word=new searsh_word;
        $search_word->consumer_id=$consumer_id;
        $search_word->word=$query;
        $search_word->save();
        //
        $category_id=$request->input('category'); 
        //if category_id=0
        if($category_id==0)
        {
            $products=product::orderBy('id','desc')->orwhere('name', 'like',"%$query%")->orwhere('short_description', 'like',"%$query%")->orwhere('long_description', 'like',"%$query%")->where('statu',1)->where('qty','!=',0)->paginate(12); 
        }
        else
        {
        //ifcategory_id!=0
        //$products=product::orderBy('id','desc')->orwhere('name', 'like',"%$query%")->orwhere('short_description', 'like',"%$query%")->orwhere('long_description', 'like',"%$query%")->where('category_id',$category_id)->where('statu',1)->where('qty','!=',0)->paginate(12);
        $category=category::findOrFail($category_id);
        //get products_ids 
        $product_id_array=[];
        $product_category=Product_Category::where('category_id',$category->id)->get();
        foreach($product_category as $p_c)
        {
            $product_id_array[]=$p_c->product_id;
        }

        $products=product::whereIn('id',$product_id_array)->orwhere('name', 'like',"%$query%")->orwhere('short_description', 'like',"%$query%")->orwhere('long_description', 'like',"%$query%")->where('statu',1)->where('qty','!=',0)->paginate(12);
        }        
        return view('store.search',compact('products','query','category_id')); 
        //return view('store.search');
    }

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
        
        $products=$query->where('statu',1)->where('qty','!=',0)->paginate(12);
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
