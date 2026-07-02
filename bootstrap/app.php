<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Mencegah Laravel memblokir request masuk dari Midtrans karena tidak membawa CSRF token
        $middleware->validateCsrfTokens(except: [
            'admin/midtrans/callback', // <--- Perbaikan di sini (hapus kata admin)
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();