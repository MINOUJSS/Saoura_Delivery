<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\admin_notefication;
use App\reading_notification;
use Auth;

class UserController extends Controller
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
        $users=User::orderBy('id','desc')->paginate(10);
        return view('admin.users',compact('users'));
    }
    public function create()
    {
        return view('admin.create-user');
    }

    public function store(Request $request)
    {
        //validateion
        $this->validate($request,[
            'user_name' => 'required|min:3',
            'user_email' => 'required|email',
            'user_password' => 'required|min:4|max:20'
            // 'user_type' => '!=0'            
        ]);
        //save
        $user= new User;
        $user->name=$request->input('user_name');
        $user->email=$request->input('user_email');
        $user->password=Hash::make($request->input('user_password'));
        $user->active=1;
        $user->type=$request->input('user_type');
        $user->save();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بإضافة مستخدم جديد';
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.users');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('رائع', 'تم إضافة المستخدم بنجاح');
        //redirecte to category page
        return redirect()->back();
    }

    public function edit($id)
    {
        $user=User::findOrFail($id);        
        return view('admin.edit-user',compact('user'));
    }

    public function update(Request $request)
    {
        //validateion
        if($request->password!=null)
        {
            $this->validate($request,[
                'user_name' => 'required|min:3',
                'user_email' => 'required|email',
                'user_password' => 'required|min:4|max:20'
                // 'user_type' => '!=0'            
            ]);
        }else
        {
            $this->validate($request,[
                'user_name' => 'required|min:3',
                'user_email' => 'required|email'                
            ]);
        }    
        //save
        $user=User::findOrFail($request->input('user_id'));
        $user->name=$request->input('user_name');
        $user->email=$request->input('user_email');
        if($request->password!=null)
        {
        $user->password=Hash::make($request->input('user_password'));
        }
        $user->active=1;
        $user->type=$request->input('user_type');
        $user->update();
        //noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بتعديل معلومات المستخدم '.$user->name;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.users');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
        //alert success message
        Alert::success('رائع', 'تم تعديل المستخدم بنجاح');
        //redirecte to category page
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $username=$user->name;
        //delete user data
        $user->delete();
        ////noteficte admin
        $note=new admin_notefication;
        $note->title='قام '.get_admin_data(Auth::guard('admin')->user()->id)->name.' بحذف المستخدم '.$username;
        $note->icon ='fa fa-info-circle';
        $note->type=1;
        $note->link=route('admin.users');
        $note->save();
        //insert reading note for this admin
        $r_note=new reading_notification;
        $r_note->admin_id=Auth::guard('admin')->user()->id;
        $r_note->note_id=$note->id;
        $r_note->save();
    }
}
