<?php
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
            <li class="nav-item">
                <a class="nav-link" href=" <?= URL::site('index/index') ?> ">Home</a>
            </li>
            <?php
                forEach($navBarElements as $element) {
                    echo $element['name'];
                }
            ?>
        </ul>
    </div>
</nav>