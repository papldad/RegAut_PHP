<?php

$key_cookie = 'ACTIVE_USER_ID';
$time_coockie = 3600;
$key_session = 'ACTIVE_USER';

class Authorization
{
    static function set_cookie($id)
    {
        global $key_cookie;
        global $time_coockie;

        setcookie($key_cookie, $id, time() + $time_coockie, '/');
    }

    static function get_cookie_value()
    {
        global $key_cookie;
        
        return $_COOKIE[$key_cookie];
    }

    static function set_session($id)
    {
        global $key_session;

        require_once("./classes/Database.php");
        $url_db_file = "./db/user.json";
        $database = new Database($url_db_file);
        $data = $database->get_record($id);

        session_start();
        $_SESSION[$key_session] = $data ?? null;

        return $data;
    }

    static function unset_aut()
    {
        global $key_cookie;
        global $time_coockie;
        global $key_session;

        setcookie($key_cookie, "", time() - $time_coockie, '/');

        unset($_SESSION[$key_session]);
    }
}
