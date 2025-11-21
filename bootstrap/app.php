<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\AdminMiddleware; // import AdminMiddleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'check.age' => CheckAge::class,
            'admin' =>\App\Http\Middleware\AdminMiddleware::class, //direct use without import
            // 'admin' => AdminMiddleware::class, // use with import
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
