<div id="my_profile">
    <h2>My profile</h2>

    <?php

    Authorization::set_session($_COOKIE['ACTIVE_USER_ID']);

    if (isset($_SESSION['ACTIVE_USER'])) {
        $user = $_SESSION['ACTIVE_USER'];
        echo View_Myprofile::myprofile($user);
        echo View_Myprofile::myprofile_action($user["id"]);
    } else {
        echo View_Myprofile::session_error();
    }

    ?>

</div>

<script src="./script/handler_myprofile.js"></script>