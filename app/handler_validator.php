<?php

function add_error(&$success, &$msg, $value)
{
    $success = false;
    array_push($msg, $value);
}

if (array_key_exists('login', $post)) {
    $login = $post['login'];

    if (!(Validation::login_unique($login))) {
        add_error($success, $msg, ['login' => 'Login already in use']);
    }

    if (!(Validation::login_min_length($login))) {
        global $min_length_login;
        add_error($success, $msg, ['login' => 'Min length - ' . $min_length_login]);
    }

    if (Validation::value_has_spaces($login)) {
        add_error($success, $msg, ['login' => 'Login has spaces']);
    }
}

if (array_key_exists('password', $post)) {
    $password = $post['password'];
    $password_confirm = $post['password_confirm'];

    if (!(Validation::pass_min_length($password))) {
        global $min_length_pass;
        add_error($success, $msg, ['password' => 'Min length - ' . $min_length_pass]);
    }

    if (!(Validation::pass_validate($password))) {
        add_error($success, $msg, ['password' => 'The password must have letters and numbers']);
    }

    if (Validation::value_has_spaces($password)) {
        add_error($success, $msg, ['password' => 'Password has spaces']);
    }

    if (!(Validation::pass_matches($password, $password_confirm))) {
        add_error($success, $msg, ['password' => 'Passwords do not match']);
        add_error($success, $msg, ['password_confirm' => '']);
    }
}

if (array_key_exists('email', $post)) {
    $email = $post['email'];

    if (!(Validation::email_unique($email))) {
        add_error($success, $msg, ['email' => 'Email already in use']);
    }

    if (!(Validation::email_validate($email))) {
        add_error($success, $msg, ['email' => 'Invalid']);
    }
}

if (array_key_exists('name', $post)) {
    $name = $post['name'];

    if (!(Validation::name_validate($name))) {
        global $min_length_name;
        global $max_length_name;
        add_error($success, $msg, ['name' => 'Only letters. Length: ' . $min_length_name . ' - ' . $max_length_name . ' letters.']);
    }

    if (Validation::value_has_spaces($name)) {
        add_error($success, $msg, ['name' => 'Name has spaces']);
    }
}
