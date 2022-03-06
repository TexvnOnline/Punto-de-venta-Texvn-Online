<?php

namespace App\Http\Middleware;

use Closure;

class ClientMiddleware
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
        if (auth()->check() && auth()->user()->hasRole('Client'))
        return $next($request);
        return redirect()->route('web.login_register')->with('toast_error', '¡Es necesario iniciar sesión para realizar esta acción!');
        // return redirect()->route('web.login_register');
    }
}
