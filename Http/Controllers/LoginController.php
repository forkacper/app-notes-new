<?php

namespace Http\Controllers;

use Core\Authenticator;
use Core\Controller;
use Core\Functions;
use Core\Session;
use Http\Forms\LoginForm;

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
        $form = LoginForm::validate($attributes = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);

        $isAuth = (new Authenticator())->auth($attributes['email'], $attributes['password']);

        if (!$isAuth) {
            $form->error('email', 'No matching account found for that email address and password.')->throw();
        }

        Functions::redirect('/');
    }
}