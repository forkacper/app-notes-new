<?php

namespace Core;

class Functions
{
    public function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
}