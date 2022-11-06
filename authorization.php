<form id="aut_form" method="POST">

    <h2>Authorization</h2>

    <div class="input-checker">
        <input id="login" type="text" name="login" placeholder="Login" autocomplete="on" required />
        <label for="login"></label>
    </div>
    <div class="input-checker">
        <input id="password" type="password" name="password" placeholder="Password" autocomplete="off" required />
        <label for="password"></label>
    </div>

    <input type="submit" name="login_user_btn" />

</form>

<script src="./script/handler_aut.js"></script>