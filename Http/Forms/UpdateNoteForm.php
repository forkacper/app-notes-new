<?php

namespace Http\Forms;

use Core\Form;
use Core\Validator;

class UpdateNoteForm extends Form
{

    protected function validateForm(array $attributes): void
    {
        if (!Validator::string('id')) {
            $this->errors['id'] = 'Something went wrong!';
        }

        if (!Validator::string($attributes['title'])) {
            $this->error('title', 'Please provide a valid note title.');
        }

        if (!Validator::string($attributes['description'], max: 255)) {
            $this->error('description', 'Please provide a valid note description.');
        }
    }
}