<?php
require_once("../classes/Ajax.php");

if (Ajax::isAjax()) {
    require_once("../classes/Authorization.php");
    $success = false;
    if ($_GET['id'] == $_SESSION['ACTIVE_USER']['id']) {
        Authorization::unset_aut();
        $success = true;
    }
    echo json_encode(array('success' => $success));
    exit;
}

exit;