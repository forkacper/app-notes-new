<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    #[\Override] protected function validateForm(array $attributes): void
    {
        if (!Validator::email($attributes['email'])) {
            $this->error('email', 'Please provide a valid email address.');
        }

        if (!Validator::string($attributes['password'])) {
            $this->error('password', 'Please provide a valid password.');
        }
    }
}
