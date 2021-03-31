<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\deal;

class StoreController extends Controller
{
    public function index()
    {   
        //get discount products
        $products=product::orderBy('id','desc')->get();
        $query=product::orderBy('id','desc');
        foreach($products as $product)
        {
            if(has_discount($product->id))
            {
                $query->orwhere('id',$product->id);
            }
        }
        $dis_products=$query->paginate(9);
        // foreach($dis_products as $product)
        // {
        //     $dis_product_ids[]=$product->id;     
        // } 
        //dd($dis_product_ids);       
        //get slider deals
        $slids=deal::orderBy('id','desc')->get();
        
        return view('store.index',compact('dis_products','slids'));
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
        $products=product::OrderBy('id','desc')->paginate(12);
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
