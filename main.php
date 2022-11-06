<?php
$active_form = $_POST['button_header'] ?? null;

if (isset($_COOKIE['ACTIVE_USER_ID'])) {
    include 'myprofile.php';
} else {
    if ($active_form == "Registration") {
        include 'registration.php';
    } else if ($active_form == "Authorization") {
        include 'authorization.php';
    } else {
        echo "<p>Please, register or log in.</p>";
    }
}
