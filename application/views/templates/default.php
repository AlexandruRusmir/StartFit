<?php
    $main = $main ?? '';
    $header = $header ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?= HTML::style('html/styles/style.css'); ?>
    <?= HTML::style('html/styles/formStyle.css'); ?>
    <?= HTML::style('html/styles/exerciseStyle.css'); ?>
    <?= HTML::style('html/styles/parallaxStyle.css'); ?>
    <?= HTML::style('html/styles/timerStyle.css'); ?>
    <?= HTML::style('html/styles/workoutPageStyle.css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?= HTML::script('/html/scripts/mootools/MooTools-Core-1.6.0.js')?>
    <?= HTML::script('html/scripts/mootools/MooTools-More-1.6.0.js')?>
    <title>Home</title>
</head>
<body>
    <?= $header; ?>

    <div>
        <?= $main; ?>
    </div>

    <div>
        <footer class="bg-dark text-white text-center position-relative">
            <div class="container">
                <p class="lead">Copyright &copy; <?= date("Y") ?> FitStart</p>
            </div>
        </footer>
    </div>
</body>
    <?= HTML::script('html/scripts/helpers.js')?>
    <?= HTML::script('html/scripts/Timer.js')?>
</html>