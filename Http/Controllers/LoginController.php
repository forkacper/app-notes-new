<?php

namespace Http\Controllers;

use Core\Controller;
use Core\Functions;
use Core\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('Login', 'login/index', [
            'foo' => 'bar'
        ]);
    }

    public function store()
    {
        $errors = [];
        if (!Validator::email($_POST['email'])) {
            $errors['email'] = 'Provide correct email';
        }
        if (!Validator::string($_POST['password'], 6, 255)) {
            $errors['password'] = 'Provide correct password';
        }

        if (!empty($errors)) {
            $this->view('Login', 'login/index', [
                'errors' => $errors;
            ]);
        }
    }
}