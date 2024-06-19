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
        //TODO: If is user auth load auth.php else guest.php
        require_once BASE_PATH . 'resources/layouts/guest.php';
    }
}