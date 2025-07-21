<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\CheckForNoSession;
use App\Http\Middleware\CheckForActiveSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(
            [
            'session.none' => CheckForNoSession::class,
            'session.active' => CheckForActiveSession::class
        ]);
        //$middleware->alias('session.none', CheckForNoSession::class);
        //$middleware->alias('session.active', CheckForActiveSession::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
