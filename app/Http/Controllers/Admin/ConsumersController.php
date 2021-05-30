<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consumer;

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
        $consumers=Consumer::orderBy('id','desc')->where('id','!=',1)->paginate(10);
        return view('admin.consumers',compact('consumers'));
    }
    public function destroy($id)
    {
        if($id==1)
        {
            return redirect()->back();
        }else
        {
            $consumer=Consumer::findOrFail($id);
            $consumer->delete();
            //
            return redirect()->back();
        }
    }
}
