<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\reply_contact;

class ReplyController extends Controller
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
        $replys=reply_contact::orderBy('id','desc')->paginate(10);
        return view('admin.inc.contact.replys',compact('replys'));
    }

    public function show($id)
    {
        $reply=reply_contact::findOrFail($id);
        return view('admin.inc.contact.show-reply',compact('reply'));
    }
}
