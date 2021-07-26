<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\deal;
use App\sid_deal;

class StoreController extends Controller
{
    public function index()
    {           
        //get discount products
        $products=product::inRandomOrder()->where('statu',1)->where('qty','!=',0)->get();
        $piked_products=product::inRandomOrder()->where('statu',1)->where('qty','!=',0)->paginate(4);
        $last_products=product::orderBy('id','desc')->where('statu',1)->where('qty','!=',0)->paginate(4);
        $query=product::orderBy('id','desc');
        foreach($products as $product)
        {
            if(has_discount($product->id))
            {
                $query->orwhere('id',$product->id);
            }else
            {
                $query->orwhere('id','0');
            }
        }
        $dis_products=$query->where('statu',1)->where('qty','!=',0)->paginate(9);
        $sid_deal=sid_deal::inRandomOrder()->first();
        //dd($dis_products);
        // foreach($dis_products as $product)
        // {
        //     $dis_product_ids[]=$product->id;     
        // } 
        //dd($dis_product_ids);       
        //get slider deals
        $slids=deal::orderBy('id','desc')->get();
        
        return view('store.index',compact('dis_products','slids','sid_deal','last_products','piked_products'));
    }

    public function dis_products($id)
    {
        // //get discount products
        // $products=product::orderBy('id','desc')->get();
        // $query=product::orderBy('id','desc');
        // foreach($products as $product)
        // {
        //     if(has_discount($product->id))
        //     {
        //         $query->orwhere('id',$product->id);
        //     }
        // }
        // $dis_products=$query->paginate(4);
        $product=product::find($id);
        return view('store.layouts.inc.index.load-dis-products',compact('product'));
    }
    
    public function products()
    {
        $products=product::OrderBy('id','desc')->where('statu',1)->where('qty','!=',0)->paginate(12);
        return view('store.products',compact('products'));
    }

    public function product_page()
    {
        return view('store.product-page');
    }

    public function checkout()
    {
        return view('store.checkout');
    }
}
