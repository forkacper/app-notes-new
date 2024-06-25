<?php

use Http\Controllers\DashboardController;
use Http\Controllers\LoginController;
use Http\Controllers\RegistrationController;

/** @var \Core\Router $router */
$router->get('/registration', RegistrationController::class, 'index')->only('guest');
$router->post('/registration', RegistrationController::class, 'store')->only('guest');

$router->get('/login', LoginController::class, 'index')->only('guest');
$router->post('/login', LoginController::class, 'store')->only('guest');

$router->get('/', DashboardController::class, 'index')->only('auth');