<?php

namespace Core;

class Session
{
    public const USER_KEY = 'user';
    public const USER_ID_KEY = Session::USER_KEY . '.id';
    public const USERNAME_KEY = Session::USER_KEY . '.username';
    public const EMAIL_KEY = Session::USER_KEY . '.email';

    public const FLASH_KEY = '_flash';
    public const ERRORS_KEY = Session::FLASH_KEY . '.errors';
    public const OLD_KEY = Session::FLASH_KEY . '.old';

    public static function start()
    {
        session_start();
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? '';
    }

    public static function unflash()
    {
        unset($_SESSION[Session::ERRORS_KEY]);
        unset($_SESSION[Session::OLD_KEY]);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}