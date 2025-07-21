<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * De URIs die toegang hebben tijdens onderhoud.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
