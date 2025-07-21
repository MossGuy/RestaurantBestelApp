<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CheckForNoSession
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('sessie_id')) {
            return Redirect::to('/klant/menu');
        }


        return $next($request);
    }
}

