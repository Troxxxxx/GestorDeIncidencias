<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware global que se ejecuta durante cada solicitud al servidor
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware específico para el grupo web
        ],

        'api' => [
            // Middleware específico para el grupo API
        ],
    ];

    protected $routeMiddleware = [
        // Middleware asignable a rutas específicas
        'auth' => \App\Http\Middleware\Authenticate::class,
        'cors' => \App\Http\Middleware\Cors::class, // Asegúrate de haber creado este Middleware
    ];
}