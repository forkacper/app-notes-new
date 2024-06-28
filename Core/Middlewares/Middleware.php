<?php

namespace Core\Middlewares;

class Middleware
{
    public const MAP = [
        'auth' => AuthMiddleware::class,
        'guest' => GuestMiddleware::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found for {$key}.");
        }

        (new $middleware)->handle();
    }
}