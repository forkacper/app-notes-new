<?php

namespace Http\Forms;

use Core\Validator;

class RegistrationForm extends Form
{

    #[\Override] protected function validateForm(array $attributes): void
    {
        if(!Validator::string($attributes['username'], 1, 255)) {
            $this->error('username', 'Please provide a valid username.');
        }

        if (!Validator::email($attributes['email'])) {
            $this->error('email', 'Please provide a valid email address.');
        }

        if (!Validator::string($attributes['password'], 6, 255)) {
            $this->error('password', 'Please provide a valid password, must contain minimum 6 characters');
        }
    }
}