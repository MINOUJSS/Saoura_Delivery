<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {   
        if($request->is('admin') ||$request->is('admin/*'))
        {
            if (! $request->expectsJson()) {
                return route('admin.login');
            }
        }elseif($request->is('consumer') ||$request->is('consumer/*'))
        {
            if (! $request->expectsJson()) {
                return route('consumer.login');
            }
        }else
        {
            if (! $request->expectsJson()) {
                return route('login');
            }
        }     
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
    }
}
