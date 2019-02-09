<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle($request, Closure $next, $guard = null)
    {
        //une fois connecter (utilisateur) d'être redirigé vers adresse
        if (Auth::guard($guard)->check()) {
            return redirect('/commande/adresse');
        }
        return $next($request);
    }
}
