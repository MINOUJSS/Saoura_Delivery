<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $title='إستمارة الطلب';
        return view('store.checkout',compact('title'));
    }
}
