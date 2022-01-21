<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Shuttle\PhpPack\Traits\ShuttlePhpPackTrait;

class TokenVerifyMiddleware
{
    use ShuttlePhpPackTrait;
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $authToken = $request->session()->get('token');

        if (isset($authToken) && !empty($authToken) && $this->tokenVerify($authToken)) {

            return $next($request);

        }
        return redirect()->route('login')->withErrors('Security token wrong or expired.Please Login again.')->withInput();


    }
}
