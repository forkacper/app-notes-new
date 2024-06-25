<?php

namespace Http\Forms;

use Core\Exceptions\ValidationException;
use Core\Validator;

abstract class Form
{
    public array $errors = [];

    public function __construct(public array $attributes)
    {
        $this->validateForm($attributes);
    }

    abstract protected function validateForm(array $attributes): void;

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function error($key, $value)
    {
        $this->errors[$key] = $value;

        return $this;
    }
}
