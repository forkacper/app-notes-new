<?php

use Http\Controllers\RegistrationController;

/** @var \Core\Router $router */
$router->get('/', RegistrationController::class, 'index');
