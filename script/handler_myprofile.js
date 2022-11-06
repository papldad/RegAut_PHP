$(document).ready(function () {

    $("#show_field_edit_form").click(function () {
        $("#password_edit_form").toggle();
    });

    $('#profile_delete_form').submit(function (e) {
        e.preventDefault();
        const ajax = new Ajax(this, `../app/delete_user.php`);
        ajax.send();
    });

    $('form').submit(function (e) {
        const idForm = this.id;
        if (idForm.includes('edit_form')) {
            e.preventDefault();
            const ajax = new Ajax(this, `../app/update_user.php`);
            ajax.send();
        }
    });

});