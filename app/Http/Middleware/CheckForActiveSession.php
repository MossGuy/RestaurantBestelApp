<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckForActiveSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('sessie_id')) {
            return redirect('/'); // naar welkom pagina
        }

        return $next($request);
    }
}
