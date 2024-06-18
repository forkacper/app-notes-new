<?php

use Http\Controllers\RegistrationController;

$router->get('/', RegistrationController::class, 'index');