<?php

use Illuminate\Foundation\Application;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'permission' => PermissionMiddleware::class,
            'role' => RoleMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //Throtling for specific exceptions
        $exceptions->throttle(function(Throwable $e) {
            if($e instanceof  BroadcastException){
                return Limit::perMinute(300)->by($e->getMessage());
            }
        });

        $exceptions->respond(function(Respond $responce) {
            switch($response->getStatusCode()){
                case 503:
                    return responce()->view('errors.503');
                case 500:
                    return responce()->view('errors.500');
                case 404:
                    return responce()->view('errors.404');
                case 403:
                    return responce()->view('errors.403');
                case 400:
                    return responce()->view('errors.400');
                case 429:
                    return responce()->view('errors.429',[], 429);
                default:
                    return $response;
            }
        });
    })->create();
?>
