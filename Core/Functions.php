<?php

namespace Core;

class Functions
{
    public static function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }

    public static function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }

    public static function old($key)
    {
        $session = Session::get(Session::OLD_KEY);
        return $session[$key] ?? null;
    }

    public static function error($key)
    {
        $session = Session::get(Session::ERRORS_KEY);
        return $session[$key] ?? null;
    }

    public static function isAuth()
    {
        return (bool) Session::get(Session::USER_ID_KEY);
    }

    public static function authorize(int $userId): bool
    {
        if ($userId === (int) Session::get(Session::USER_ID_KEY)) {
            return true;
        }

        return false;
    }

    public static function isUrl($url): bool
    {
        return $url === $_SERVER['REQUEST_URI'];
    }
}