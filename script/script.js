class Ajax {

    constructor(target, filePhp) {
        this.target = target;
        this.filePhp = filePhp;
    }

    send() {

        $.ajax({
            type: this.target.method,
            url: this.filePhp,
            data: $(this.target).serialize(),
            success: function (response) {
                Ajax.prototype.clearInputs();

                const res = JSON.parse(response);
                const success = res.success;
                const messages = res.msg;

                if (success) location.href = './index.php';
                else if (!(success)) Ajax.prototype.getInfoInputs(messages);

            }
        });

    }

    clearInputs() {
        $(`input`).removeClass('input-error');
        $(`label`).text('');
    };

    getInfoInputs(messages) {

        const keys = Object.keys(messages);

        for (let i = 0; i < keys.length; i++) {

            const value = Object.values(messages)[i];
            const idInput = Object.keys(value);
            const messageInput = Object.values(value)

            $(`#${idInput}`).addClass('input-error');
            $(`label[for="${idInput}"]`).text(`* ${messageInput}`);

        }
    };
}