<?php

namespace Core;

use Core\Middlewares\Middleware;

class Router
{
    protected array $routes = [];

    private function addRoute($url, $controller, $action, $method) {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'action' => $action,
            'method' => $method,
            'middleware' => ''
        ];

        return $this;
    }

    public function get($url, $controller, $action) {
        return $this->addRoute($url, $controller, $action, 'GET');
    }

    public function post($url, $controller, $action) {
        return $this->addRoute($url, $controller, $action, 'POST');
    }

    public function delete($url, $controller, $action) {
        return $this->addRoute($url, $controller, $action, 'DELETE');
    }

    public function patch($url, $controller, $action) {
        return $this->addRoute($url, $controller, $action, 'PATCH');
    }

    public function route($url, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === $method) {
                Middleware::resolve($route['middleware']);

                $controller = $route['controller'];
                $action = $route['action'];

                return (new $controller())->$action();
            }
        }

        $this->abort();
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    private function abort($code = 404)
    {
        http_response_code($code);

        require_once BASE_PATH . 'Http/Controllers/' . $code . '.php';

        die();
    }
}