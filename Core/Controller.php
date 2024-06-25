<?php

namespace Core;

abstract class Controller
{
    protected $db;
    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function view($title, $file, $data = [])
    {
        extract($data);

        if (Functions::isAuth()) {
            require_once BASE_PATH . 'resources/layouts/auth.php';
        } else {
            require_once BASE_PATH . 'resources/layouts/guest.php';
        }
    }
}