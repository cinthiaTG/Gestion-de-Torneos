<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Maneja la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $roleId
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roleId)
    {
        // Verifica que el usuario autenticado tiene el rol correcto
        if (auth()->check() && auth()->user()->rol_id == $roleId) {
            return $next($request);
        }

        // Redirige al dashboard principal con un mensaje de error
        return redirect()->route('dashboard')->with('error', 'No tienes permiso para acceder a esta sección.');
    }
}
