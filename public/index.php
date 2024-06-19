<?php
const BASE_PATH = __DIR__.'/../';

require_once BASE_PATH . '/vendor/autoload.php';

use Core\Router;

require_once BASE_PATH . 'bootstrap.php';

$router = new Router();
require_once BASE_PATH . 'app/routes.php';

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($url, $method);