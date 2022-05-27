<?php

$category = $category ?? null;
?>

<div class="row user-box">
    <div class="col-4">
        <p>ID: <?= $category->id ?> </p>
    </div>
    <div class="col-4">
        <p>Category: <?= $category->category ?> </p>
    </div>
    <div>
        <button data-id=<?="{$category->id}" ?> class='remove-admin-button'>Delete category</button>
    </div>

</div>