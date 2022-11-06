$(document).ready(function () {

    $('#header_form').submit(function (e) {
        e.preventDefault();
        const ajax = new Ajax(this, `../app/logout_user.php`);
        ajax.send();
    });

});