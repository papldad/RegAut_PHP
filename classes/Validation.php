<?php

// SETTINGS
$min_length_login = 6;
$min_length_pass = 6;
$min_length_name = 2;
$max_length_name = 255;

class Validation
{

    static function value_has_spaces($value)
    {
        if (stristr($value, ' ')) {
            return true;
        }
        return false;
    }

    static function login_unique($login)
    {
        $database = new Database();
        $db_user = $database->read();

        foreach ($db_user as $user) {
            if ($user['login'] == $login) {
                return false;
            }
        }
        return true;
    }

    static function login_min_length($login)
    {
        global $min_length_login;

        if (strlen($login) < $min_length_login) {
            return false;
        }
        return true;
    }

    static function pass_min_length($password)
    {
        global $min_length_pass;

        if (strlen($password) < $min_length_pass) {
            return false;
        }
        return true;
    }

    static function pass_validate($password)
    {
        if (preg_match('/[A-zА-я]+/', $password)) {
            if (preg_match('/[0-9]+/', $password)) {
                return true;
            }
        }
        return false;
    }

    static function pass_matches($password, $password_confirm)
    {
        if ($password === $password_confirm) {
            return true;
        }
        return false;
    }

    static function email_unique($email)
    {
        $database = new Database();
        $db_user = $database->read();

        foreach ($db_user as $user) {
            if ($user['email'] == $email) {
                return false;
            }
        }
        return true;
    }

    static function email_validate($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    static function name_validate($name)
    {
        global $min_length_name;
        global $max_length_name;

        if (strlen($name) >= $min_length_name && strlen($name) <= $max_length_name) {
            if (ctype_alpha($name)) {
                return true;
            }
        }
        return false;
    }

    static function login_pass_mathes($user, $entered_login, $entered_password)
    {
        if (
            $user['login'] == $entered_login &&
            $user['password'] == Hash::decryption($entered_password, $user['password'])
        ) {
            return true;
        }
        return false;
    }
}
