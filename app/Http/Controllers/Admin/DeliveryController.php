<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\order;

class DeliveryController extends Controller
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
        $orders=order::where('status',2)->paginate(10);
        return view('admin.inc.delivery-list.delivery-list',compact('orders'));
    }

    public function print()
    {        
        $title='طباعة قائمة تسليم الطلبات';
        $orders=order::where('status',2)->get();
        return view('admin.inc.delivery-list.print-delivery-list',compact('orders','title'));
    }
}
