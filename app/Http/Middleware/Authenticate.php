<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

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
        if (!$request->expectsJson()) {
            return route('login');
        }
        if (Auth::user()->status == -1) {
            Auth::logout();
            session()->flush();
            toast('Tài khoản đã bị vô hiệu hoá','error');
            return route('trang-chu');
        }
        if (Auth::user()->isAdmin == 1) {
            return route('admin.index');
        }
    }
}
