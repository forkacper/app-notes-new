<?php

namespace Http\Controllers;

use Core\Controller;
use Core\Functions;
use Core\Session;
use Http\Forms\CreateNoteForm;
use Http\Forms\RegistrationForm;

class NotesController extends Controller
{
    public function index()
    {
        $notes = $this->db->query('SELECT * FROM notes WHERE user_id = :user_id', [
            'user_id' => Session::get(Session::USER_ID_KEY)
        ])->get();

        $this->view('Notes', 'notes/index', [
            'notes' => $notes
        ]);
    }

    public function create()
    {
        $this->view('Create Note', 'notes/create');
    }

    public function store()
    {
        CreateNoteForm::validate($attributes = [
            'title' => $_POST['title'],
            'description' => $_POST['description']
        ]);

        $attributes['user_id'] = Session::get(Session::USER_ID_KEY);

        $this->db->query('INSERT INTO notes (title, description, user_id) VALUES (:title, :description, :user_id)', $attributes);

        Functions::redirect('/notes');
    }
}