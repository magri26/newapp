<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\MenuItem;


class LoadMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Generar el menú
        //$menu = MenuItem::getMenu();
        //dd($menu);
        // Compartirlo con las vistas
        //view()->share('menu', $menu);

        return $next($request);
    }
}
