<?php

namespace Core;
use Couchbase\BaseException;

class Router
{
    protected array $routes = [];

    private function addRoute($url, $controller, $action, $method) {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'action' => $action,
            'method' => $method,
        ];
    }

    public function get($url, $controller, $action) {
        return $this->addRoute($url, $controller, $action, 'GET');
    }

    public function post($url, $controller, $action) {
        return $this->addRoute($url, $controller, $action, 'POST');
    }

    public function route($url, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === $method) {

                $controller = $route['controller'];
                $action = $route['action'];

                return (new $controller())->$action();
            }
        }

        $this->abort();
    }

    private function abort($code = 404)
    {
        http_response_code($code);

        require_once BASE_PATH . 'Http/Controllers/' . $code . '.php';

        die();
    }
}