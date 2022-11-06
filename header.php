<?php
if (isset($_COOKIE['ACTIVE_USER_ID'])) {

    Authorization::set_session($_COOKIE['ACTIVE_USER_ID']);

    if (isset($_SESSION['ACTIVE_USER'])) {
        $id = $_SESSION['ACTIVE_USER']['id'];
        $name = $_SESSION['ACTIVE_USER']['name'];
        echo View_Header::active_user($id, $name);
    } else {
        echo View_Header::session_error();
    }
} else {
    echo View_Header::not_active_user();
}
?>

<script src="./script/handler_header.js"></script>