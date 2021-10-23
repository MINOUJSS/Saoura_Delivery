<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThankYouPageController extends Controller
{
    public function index()
    {
        // if(session()->has('order_id'))
        // {
        //     return view('store.thank-you-page');            
        // }
        // else
        // {
        //     return redirect()->back();
        // }  
        return view('store.thank-you-page');      
    }
}
