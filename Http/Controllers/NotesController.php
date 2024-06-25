<?php

namespace Http\Controllers;

use Core\Controller;

class NotesController extends Controller
{
    public function index()
    {
        $this->view('Notes', 'notes/index');
    }
}