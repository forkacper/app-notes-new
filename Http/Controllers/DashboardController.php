<?php

namespace Http\Controllers;

use Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $this->view('Dashboard', 'index');
    }
}