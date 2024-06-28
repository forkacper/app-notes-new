<?php

namespace Http\Forms;

use Core\Validator;

class CreateNoteForm extends Form
{

    #[\Override] protected function validateForm(array $attributes): void
    {
        if (!Validator::string($attributes['title'])) {
            $this->error('title', 'Please provide a valid note title.');
        }

        if (!Validator::string($attributes['description'], max: 255)) {
            $this->error('description', 'Please provide a valid note description.');
        }
    }
}