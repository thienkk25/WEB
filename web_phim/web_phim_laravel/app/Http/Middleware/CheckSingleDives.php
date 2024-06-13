<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Users;

class CheckSingleDives
{
    protected $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('islogedin') && session()->getId()) {
            $last_session = $this->users->checkDives(session()->getId());
            if (empty($last_session[0])) {
                session()->forget('islogedin');
                return redirect()->route('home');
            } else {
                return $next($request);
            }
        }
        return $next($request);
    }
}
