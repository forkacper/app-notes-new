<?php

namespace Http\Forms;

use Core\Validator;
use Http\Forms\Form;

class DeleteNoteForm extends Form
{

    protected function validateForm(array $attributes): void
    {
        if (!Validator::string($attributes['id']))
        {
            $this->errors['id'] = 'Something went wrong, please try again!';
        }
    }
}