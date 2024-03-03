<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user() && auth()->user()->tipoDeUsuario === 'Premium' || auth()->user()->tipoDeUsuario === 'Administrador') {
            return $next($request);
        }
        return abort(404, 'Página no encontrada');
    }
}
