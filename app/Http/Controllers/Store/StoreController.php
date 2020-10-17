<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
    }
    
    public function products()
    {
        return view('store.products');
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
