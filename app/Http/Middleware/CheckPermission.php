<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;


class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null(session()->get('permissions'))) return redirect()->route('login');

        $permissionArr      = session()->get('permissions')->toArray();
        $currentRouteName   = Route::currentRouteName();
        $hasAccess          = false;

        if (isset($permissionArr)) {
            if (in_array($currentRouteName, $permissionArr)) {
                $hasAccess = true;
            }
        }

        if (!$hasAccess) {
            return  back()->withErrors('You have no permission to access this module.')->withInput();
        } else {
            return $next($request);
        }

    }
}
