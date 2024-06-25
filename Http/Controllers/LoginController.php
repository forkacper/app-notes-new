<?php

namespace Http\Controllers;

use Core\Controller;
use Core\Functions;
use Core\Session;
use Core\Validator;
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
        LoginForm::validate($attributes = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $attributes['email']
        ])->find();

        if (empty($user)) {
            $errors['email'] = 'Provide correct user details!';

            $this->view('Login', 'login/index', [
                'errors' => $errors
            ]);
        }

        if (!password_verify($_POST['password'], $user['password'])) {
            $errors['email'] = 'Provide correct user details!';

            $this->view('Login', 'login/index', [
                'errors' => $errors
            ]);
        }

        //login
        Session::set(Session::EMAIL_KEY, $user['email']);
        Session::set(Session::USERNAME_KEY, $user['username']);


    }
}