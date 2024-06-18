<?php

namespace Http\Controllers;

use Core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('login', 'login/index', [
            'foo' => 'bar'
        ]);
    }
}