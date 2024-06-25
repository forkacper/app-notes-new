<?php
const BASE_PATH = __DIR__.'/../';

require_once BASE_PATH . '/vendor/autoload.php';

use Core\Exceptions\ValidationException;
use Core\Functions;
use Core\Router;
use Core\Session;

require_once BASE_PATH . 'bootstrap.php';

$router = new Router();
require_once BASE_PATH . 'app/routes.php';

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

Session::start();

try {
    $router->route($url, $method);
} catch (ValidationException $exception) {
    Session::set(Session::ERRORS_KEY, $exception->errors);
    Session::set(Session::OLD_KEY, $exception->old);

    Functions::redirect($router->previousUrl());
}

Session::unflash();