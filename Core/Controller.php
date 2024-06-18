<?php

namespace Core;

class Controller
{
    public function view($title, $file, $data = [])
    {
        require_once BASE_PATH . 'resources/views/' . $file . '.php';
    }
}