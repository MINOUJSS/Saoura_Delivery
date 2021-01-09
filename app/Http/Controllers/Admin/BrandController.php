<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
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
        return view('admin.brands');
    }
    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy()
    {

    }
}
