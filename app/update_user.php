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
    $success = true;
    $msg = [];

    include("./handler_validator.php");

    if ($success) {
        $id = Authorization::get_cookie_value();
        if (array_key_exists('password', $post)) {
            $_POST[key($_POST)] = Hash::encryption($password);
        }
        $database = new Database();
        $database->update($id, key($_POST), $_POST[key($_POST)]);
    }

    return array(
        'success' => $success,
        'msg' => $msg
    );
}
