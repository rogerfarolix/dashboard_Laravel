<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si l'utilisateur est un administrateur
        if (auth()->check()) {
            return $next($request);
        }

        // Redirigez si l'utilisateur n'est pas un administrateur
        return redirect('/home');
    }
}