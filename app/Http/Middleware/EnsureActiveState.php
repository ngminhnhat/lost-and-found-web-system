<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EnsureActiveState
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status==-1) {
            Auth::logout();
            session()->flush();
            Alert::error('Tài khoản đã bị vô hiệu hoá!','Vui lòng liên hệ với quản trị viên để biết thêm chi tiết.');
            return redirect('/home');
        }

        return $next($request);
    }
}
