<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            //Route::middleware('api')
            //    ->prefix('api')
            //    ->group(base_path('routes/api/api.php'));
            //
            //Route::middleware('api')
            //    ->prefix('api')
            //    ->group(base_path('routes/api/manager.php'));
            //
            //Route::middleware('api')
            //    ->prefix('api')
            //    ->group(base_path('routes/api/owner.php'));

            Route::middleware(['web'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/web.php'));
        },
        api:      __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health:   '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectTo(
            guests: '/admin/login',
            users:  '/dashboard'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
