<?php

namespace Core;

class Container
{
    protected array $bindings = [];

    public function bind($key, $resolver) {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) {
        return call_user_func($this->bindings[$key]);
    }
}