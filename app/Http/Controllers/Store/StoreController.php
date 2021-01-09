<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
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
