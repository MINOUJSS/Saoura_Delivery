<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\consumer;

class ConsumersController extends Controller
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
        $consumers=consumer::orderBy('id','desc')->paginate(10);
        return view('admin.consumers',compact('consumers'));
    }
}
