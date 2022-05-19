<?php
$message = $message ?? '';
?>

<form class="form-container" method="post" action='<?= URL::site('register/login') ?>'>
    <h1>Login here!</h1>

    <div class="input-group">
        <input type="text" placeholder="Username" name="username" required>
    </div>

    <div class="input-group">
        <input type="password" id="password" name="password" placeholder="Password" required/>
    </div>

    <div style="display: flex">
        <input type="submit" name='submit' class="submit-btn"/>
    </div>
    <?= $message; ?>

    <div style="display: flex">
        <p class="login-register-text">Don't have an account? <a href=" <?= URL::site('register/display_register'); ?> ">Register here</a>.</p>
    </div>
</form>