<?php

$category = $category ?? null;
?>

<div class="row category-box">
    <div class="col-3">
        <p>ID: <?= $category->id ?> </p>
    </div>
    <div class="col-5">
        <p>Category: <?= $category->name ?> </p>
    </div>
    <div class="col-4">
        <button data-id=<?="{$category->id}" ?> class='delete-button'>Delete category</button>
    </div>
</div>