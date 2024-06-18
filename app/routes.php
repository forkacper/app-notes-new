<?php

use Http\Controllers\LoginController;
use Http\Controllers\RegistrationController;

/** @var \Core\Router $router */
$router->get('/registration', RegistrationController::class, 'index');
$router->get('/', LoginController::class, 'index');
