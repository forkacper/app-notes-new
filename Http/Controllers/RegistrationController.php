<?php

namespace Http\Controllers;

use Core\Authenticator;
use Core\Controller;
use Core\Functions;
use Http\Forms\RegistrationForm;

class RegistrationController extends Controller
{
    public function index()
    {
        $this->view('Registration', 'registration/index');
    }

    public function store()
    {
        $form = RegistrationForm::validate($attributes = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);

        //Check is user exist in database
        $isUserExist = $this->db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $attributes['email']
        ])->find();

        if ($isUserExist) {
            $form->error('email', 'User with selected email already exists!')->throw();
        }

        $lastId = $this->db->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)', [
            'username' => $attributes['username'],
            'email' => $attributes['email'],
            'password' => password_hash($attributes['password'], PASSWORD_BCRYPT)
        ])->lastId();

        (new Authenticator)->login($attributes['email'], $attributes['username'], $lastId);

        Functions::redirect('/');
    }
}