<?php

namespace Http\Controllers;

use Core\Controller;
use Core\Functions;
use Core\Response;
use Core\Session;
use Http\Forms\CreateNoteForm;
use Http\Forms\DeleteNoteForm;
use Http\Forms\RegistrationForm;
use Http\Forms\UpdateNoteForm;

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

    public function destroy()
    {
        DeleteNoteForm::validate($attributes = [
            'id' => $_POST['id']
        ]);

        $note = $this->db->query('SELECT * FROM notes WHERE id = :id', $attributes)->find();

        if (!Functions::authorize($note['user_id'])) {
            $this->abort();
        }

        $this->db->query('DELETE FROM notes WHERE id = :id', $attributes);

        Functions::redirect('/notes');
    }

    public function show()
    {
        if (empty($_GET['id'])) $this->abort(Response::NOT_FOUND);

        $note = $this->db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->find();

        if (!$note) $this->abort(Response::NOT_FOUND);

        if (!Functions::authorize($note['user_id'])) $this->abort(Response::UNAUTHORIZED);

        $this->view('Edit Note', 'notes/show', $note);
    }

    public function update()
    {
        UpdateNoteForm::validate($attributes = [
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'description' => $_POST['description']
        ]);

        $note = $this->db->query('SELECT * FROM notes WHERE id = :id', [
            'id' => $attributes['id']
        ])->find();

        if (!$note) $this->abort(Response::NOT_FOUND);

        if (!Functions::authorize($note['user_id'])) $this->abort(Response::UNAUTHORIZED);

        $this->db->query('UPDATE notes SET title = :title, description = :description WHERE id = :id', $attributes);

        Functions::redirect('/notes');
    }
}