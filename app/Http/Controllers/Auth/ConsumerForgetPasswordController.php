<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumerForgetPasswordController extends Controller
{
    public function ShowForgetPasswordForm()
    {
        return view('Auth.passwords.consumer.reset');
    }
}
