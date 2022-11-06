$(document).ready(function () {

    $('#reg_form').submit(function (e) {
        e.preventDefault();
        const ajax = new Ajax(this, `../app/create_user.php`);
        ajax.send();
    });

});