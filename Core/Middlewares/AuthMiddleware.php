<?php

namespace Core\Middlewares;

use Core\Contracts\MiddlewareContract;
use Core\Functions;
use Core\Session;

class AuthMiddleware implements MiddlewareContract
{
    public function handle()
    {
        if (!Functions::isAuth() ?? false)
        {
            Functions::redirect('/login');
        }
    }
}