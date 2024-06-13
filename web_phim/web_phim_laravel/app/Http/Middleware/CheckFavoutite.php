<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFavoutite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('islogedin')) {
            return redirect()->route('login')->with('msg', 'Vui lòng đăng nhập để truy cập vào trang yêu thích');
        }
        return $next($request);
    }
}
