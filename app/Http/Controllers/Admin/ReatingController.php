<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\reating;

class ReatingController extends Controller
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
        $reatings=reating::orderBy('id','desc')->paginate(10);
        return view('admin.reatings',compact('reatings'));
    }
    public function approve($id)
    {
        //apdate visiblility of reating
        $reating=reating::findOrFail($id);
        $reating->visible=1;
        $reating->update();
        //redirect back
        return redirect()->back();
    }
    public function show($id)
    {
        $reating=reating::findOrFail($id);
        return view('admin.reating-details',compact('reating'));
    }
    public function destroy($id)
    {
        $reating=reating::findOrFail($id);
        $reating->delete();
        //success alert
        Alert::success('رائع','تم حذف تقييم المستهلك لهذا المنتج');
        //redirect
       // return redirect(route('admin.reatings'));
    }
}
