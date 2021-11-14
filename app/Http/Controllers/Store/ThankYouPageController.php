<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThankYouPageController extends Controller
{
    public function index()
    {
        $title='شكراً';
        if(session()->has('order_id'))
        {
            return view('store.thank-you-page',compact('title'));            
        }
        else
        {
            return redirect()->back();
        }                    
    }
}
