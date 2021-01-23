<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\searsh_word;

class SearshWordsController extends Controller
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
        $searsh_words=searsh_word::orderBy('id','desc')->paginate(10);
        return view('admin.searsh-words',compact('searsh_words'));
    }
}
