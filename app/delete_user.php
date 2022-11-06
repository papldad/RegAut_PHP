<?php
require_once("../classes/Ajax.php");

if (Ajax::isAjax()) {
    require_once("../classes/Database.php");
    require_once("../classes/Authorization.php");

    $id = $_GET["id_delete"];

    echo json_encode(delete_user($id));
    exit;
}

exit;

function delete_user($id)
{
    $success = false;
    $database = new Database();

    if ($database->delete($id)) {
        Authorization::unset_aut();
        $success = true;
    }

    return array(
        'success' => $success,
        'msg' => []
    );
}
