<?php
require_once("../classes/Ajax.php");

if (Ajax::isAjax()) {
    require_once("../classes/Database.php");
    require_once("../classes/Validation.php");
    require_once("../classes/Hash.php");
    require_once("../classes/Authorization.php");

    echo json_encode(validator($_POST));
    exit;
}

exit;

function validator($post)
{
    $login = $post['login'];
    $password = $post['password'];

    $database = new Database();
    $db_user = $database->read();

    $msg = ['login' => 'Invalid Login or Password'];

    foreach ($db_user as $user) {
        if (Validation::login_pass_mathes($user, $login, $password)) {

            Authorization::set_cookie($user['id']);

            return array(
                'success' => true,
            );
        }
    }

    return array(
        'success' => false,
        'msg' => [$msg]
    );
}
