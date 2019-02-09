<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        // si user non loggé ou si user n'est pas admin
        if (null=== $request->user() || $request->user()->role_id!==1 ){
            return redirect(route('homepage'));
                                                                        }
            return $next($request);
    }
}
