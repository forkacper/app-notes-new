<?php

namespace Core;

abstract class Controller
{
    protected Database $db;
    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function view($pageTitle, $file, $data = [])
    {
        extract($data);

        if (Functions::isAuth()) {
            require_once BASE_PATH . 'resources/layouts/auth.php';
        } else {
            require_once BASE_PATH . 'resources/layouts/guest.php';
        }
    }

    public function abort($response = Response::UNAUTHORIZED)
    {
        $file = 'errors/' . $response;
        $this->view('Something went wrong!', $file, []);
        die();
    }
}