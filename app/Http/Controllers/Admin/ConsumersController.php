<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consumer;
use App\admin_notefication;
use App\reading_notification;
use Auth;

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
                //noteficte admin
                $note=new admin_notefication;
                $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف المستهلك '.$consumer->name;
                $note->icon ='fa fa-info-circle';
                $note->type=1;
                $note->link=route('admin.orders');
                $note->save();
                //insert reading note for this admin
                $r_note=new reading_notification;
                $r_note->admin_id=Auth::guard('admin')->user()->id;
                $r_note->note_id=$note->id;
                $r_note->save();        
            //
            return redirect()->back();
        }
    }
}
