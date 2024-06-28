<?php

use Http\Controllers\DashboardController;
use Http\Controllers\LoginController;
use Http\Controllers\NotesController;
use Http\Controllers\RegistrationController;

/** @var \Core\Router $router */
$router->get('/registration', RegistrationController::class, 'index')->only('guest');
$router->post('/registration', RegistrationController::class, 'store')->only('guest');

$router->get('/login', LoginController::class, 'index')->only('guest');
$router->post('/login', LoginController::class, 'store')->only('guest');
$router->delete('/login', LoginController::class, 'destroy')->only('auth');

$router->get('/', DashboardController::class, 'index')->only('auth');
$router->get('/notes', NotesController::class, 'index')->only('auth');
$router->get('/notes/create', NotesController::class, 'create')->only('auth');
$router->post('/notes/create', NotesController::class, 'store')->only('auth');