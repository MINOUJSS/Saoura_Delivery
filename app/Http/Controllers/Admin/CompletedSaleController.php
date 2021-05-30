<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Completed_Sale;

class CompletedSaleController extends Controller
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
        $sales=Completed_Sale::orderBy('id','desc')->paginate(10);
        return view('admin.sales',compact('sales'));
    }
}
