<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(
            [
                'admin.guest' => \App\Http\Middleware\AdminRedirect::class,
                'admin.auth' => \App\Http\Middleware\AdminAuthenticate::class,
                'member.guest' => \App\Http\Middleware\MemberRedirect::class,
                'member.auth' => \App\Http\Middleware\MemberAuthenticate::class,
                'boardmember.guest'=>\App\Http\Middleware\BoardMemberRedirect::class,
                'boardmember.auth'=>\App\Http\Middleware\BoardMemberAuthenticate::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
