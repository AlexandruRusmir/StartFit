<?php
    $message = $message ?? '';
?>

<form class="form-container" method="post" action='<?= URL::site('register/register') ?>'>
    <h1>Register here!</h1>
    <div class="input-group">
        <input type="text" placeholder="Username" name="name" required>
    </div>

    <div class="input-group">
        <input type="email" placeholder="E-mail" name="email" required>
    </div>

    <div class="input-group">
        <input type="password" name="password" placeholder="Password" required/>
    </div>

    <div class="input-group">
        <input type="password" name="confirmPassword" placeholder="Confirm Password" required/>
    </div>

    <?= $message; ?>
    <div style="display: flex">
        <input type="submit" name='submit' class="submit-btn"/>
    </div>

    <div style="display: flex">
        <p class="login-register-text">Already have an account?
            <a href=" <?= URL::site('register/index'); ?> ">Login here</a>.</p>
    </div>

</form>