<?php

namespace Core;

class Authenticator
{
    public function auth($email, $password)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if (empty($user)) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        self::login($user['email'], $user['username'], $user['id']);

        return true;
    }

    public function login($email, $username, $id)
    {
        Session::set(Session::EMAIL_KEY, $email);
        Session::set(Session::USERNAME_KEY, $username);
        Session::set(Session::USER_ID_KEY, $id);
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}