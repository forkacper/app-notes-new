<?php

namespace Http\Controllers;

use Core\Controller;

class RegistrationController extends Controller
{
    public function index()
    {
        $this->view('Registration', 'registration/index', [
            'foo' => 'bar'
        ]);
    }
}