<?php

namespace Http\Controllers;

use Core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('Login', 'login/index', [
            'foo' => 'bar'
        ]);
    }
}