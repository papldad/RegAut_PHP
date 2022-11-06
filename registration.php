<form id="reg_form" method="POST">

    <h2>Registration</h2>

    <div class="input-checker">
        <input id="login" type="text" name="login" placeholder="Login" autocomplete="on" required />
        <label for="login"></label>
    </div>
    <div class="input-checker">
        <input id="password" type="password" name="password" placeholder="Password" autocomplete="off" required />
        <label for="password"></label>
    </div>
    <div class="input-checker">
        <input id="password_confirm" type="password" name="password_confirm" placeholder="Password Confirm" autocomplete="off" required />
        <label for="password_confirm"></label>
    </div>
    <div class="input-checker">
        <input id="email" type="email" name="email" placeholder="Email" autocomplete="on" required />
        <label for="email"></label>
    </div>
    <div class="input-checker">
        <input id="name" type="text" name="name" placeholder="Name" autocomplete="on" required />
        <label for="name"></label>
    </div>

    <input type="submit" name="create_user_btn" />

</form>

<script src="./script/handler_reg.js"></script>