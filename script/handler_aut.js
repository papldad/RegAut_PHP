$(document).ready(function () {

    $('#aut_form').submit(function (e) {
        e.preventDefault();
        const ajax = new Ajax(this, `../app/login_user.php`);
        ajax.send();
    });

});