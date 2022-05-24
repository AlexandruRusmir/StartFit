<?php

    function addSpecialClass(string $name): string
    {
        if($name === 'Login')
            return 'login';
        if($name === 'Logout')
            return 'logout';
        return '';
    }

    function navBarElementHTML(array $element): string
    {
        return "<li class='nav-item'>
                    <a class='nav-link " . addSpecialClass($element['name']) .
                        "' href='${element['url']}'> ${element["name"]} </a>
                </li>";
    }

    $navBarElements = $navBarElements ?? null;
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href=" <?= URL::site('index/index') ?> ">
        <img src="" style="width: 100px; height: auto" alt="Logo picture"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <?php
                forEach($navBarElements as $element) {
                    echo navBarElementHTML($element);
                }
            ?>
        </ul>
    </div>
</nav>