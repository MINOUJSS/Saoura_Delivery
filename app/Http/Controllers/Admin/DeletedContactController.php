<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\deleted_contact;

class DeletedContactController extends Controller
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
        $contacts=deleted_contact::orderBy('id','desc')->paginate(2);
        return view('admin.inc.contact.deleted-contacts',compact('contacts'));
    }
}
