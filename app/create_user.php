<?php
require_once("../classes/Ajax.php");

if (Ajax::isAjax()) {
    require_once("../classes/Database.php");
    require_once("../classes/Validation.php");
    require_once("../classes/Hash.php");
    require_once("../classes/User.php");
    require_once("../classes/Authorization.php");

    echo json_encode(validator($_POST));
    exit;
}

exit;

function validator($post)
{
    $success = true;
    $msg = [];

    include("./handler_validator.php");

    if ($success) {
        $login = $post['login'];
        $password =  Hash::encryption($post['password']);
        $email = $post['email'];
        $name = $post['name'];

        create_user($login, $password, $email, $name);
    }

    return array(
        'success' => $success,
        'msg' => $msg
    );
}

function create_user($login, $password, $email, $name)
{
    $database = new Database();
    $newUser = new User($login, $password, $email, $name);
    $user = $newUser->get_data();

    if ($database->create($user)) {
        Authorization::set_cookie($user['id']);
    }
}
