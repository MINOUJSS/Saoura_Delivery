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
    public function destroy($id)
    {
        $reating=reating::findOrFail($id);
        $reating->delete();
        //success alert
        Alert::success('رائع','تم حذف تقييم المستهلك لهذا المنتج');
        //redirect
        return redirect()->back();
    }
}
